

<?php

 include 'dbconnect.php';

if(isset($_SESSION['event_id']))
{
  $evid=$_SESSION['event_id'];
  if(isset($_SESSION['acco_units']))
  {
  $acco_units=$_SESSION['acco_units'];
  }
  else {
     $acco_units=0;
  }
  if(isset($_SESSION['registrants']))
  {
  $registrants=$_SESSION['registrants'];
  }
  else {
     $registrants=1;
  }
  $_SESSION['acco_cost']=$acco_units*150;//htodo acco chrg

  //get event details
  $sql = 'SELECT title,reg_fee FROM events where event_id='.$evid;
         $result = mysqli_query($conn, $sql);

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               $_SESSION['event_cost']=$row["reg_fee"]*$registrants;
               $_SESSION['event_id']=$evid;
               $_SESSION['event_title']=$row["title"];
            }
         } else {
            exit("invalid request");
         }


         $sql = 'SELECT fullname,phone FROM users where email='."'".$email."'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                   while($row = mysqli_fetch_assoc($result)) {
                     $_SESSION['name']=$row["fullname"];
                      $_SESSION['phone']=$row["phone"];
                    //echo $row['email'];

                   }
                } else {
                   exit("invalid login");
                }


}
else {
  exit("modded request");
}

 try {
     $amount=$_SESSION['event_cost']+$_SESSION['acco_cost'];


     //chek free event
     if($amount==0)
     {
       $sql3 = 'DELETE from regtemp1 where reg_key='."'".$_SESSION['reg_key']."'";
         $result3 = mysqli_query($conn, $sql3);
         for($i=0;$i<sizeof($marray);$i++)
            {
              $stmt = $conn->prepare("INSERT INTO registration(event_id,reg_email,member_email,referral_code) VALUES (?,?,?,?)");
              $stmt->bind_param("isss", $p2, $p3,$p4,$p5);
            //  $p1=$_SESSION['reg_key'] ;
              $p2=$evid ;
              $p3=$email ;
              $p4=$marray[$i]['email'] ;
              $p5='';


              $stmt->execute();
              if($stmt->affected_rows === 0)
                exit('Missing data error');
            }
       include 'freesuccess.html';
       exit();
     }


     $purp=$base_app_title.' - '.$_SESSION['event_title'];
     if($acco_units!=0)
     {
       $purp=$purp.' and Accomodation('.$acco_units.')';
     }

     if($amount<2000)
     {
     include 'src/Instamojo.php';
     $api = new Instamojo\Instamojo($private_api, $private_token);
     $response = $api->paymentRequestCreate(array(
         "purpose" => $purp,
         "amount" => $amount,
         "send_email" => false,
         "send_sms" => false,
         "webhook" => $base_app_url."payment/hook.php",
         //"webhook" => "https://webhook.site/6e686436-df49-4a2c-9cf3-000e3d9499fb",
         "email" => $email,
         "phone" => $_SESSION['phone'],
         "buyer_name" => $_SESSION['name'],
         "redirect_url" => $base_app_url."payment/finish.php"
         ));
         //print_r($response);
        //echo $response[longurl];
        if (! array_key_exists("longurl",$response))
            echo '<br>'.'visit <a href="'.$base_app_url.'myprofile">'.$base_app_url.'myprofile</a> to corect your mobile number';
        $_SESSION['redir_url']=$response['longurl'];
      }
      else {
        include 'src2/Instamojo.php';
        $api = new Instamojo\Instamojo($private_api2, $private_token2);
        $response = $api->paymentRequestCreate(array(
            "purpose" => $purp,
            "amount" => $amount,
            "send_email" => true,
            "send_sms" => true,
            "webhook" => $base_app_url."payment/hook2.php",
            //"webhook" => "https://webhook.site/6e686436-df49-4a2c-9cf3-000e3d9499fb",
            "email" => $email,
            "phone" => $_SESSION['phone'],
            "buyer_name" => $_SESSION['name'],
            "redirect_url" => $base_app_url."payment/finishpay.php"
            ));
            //print_r($response);
           //echo $response[longurl];
           $_SESSION['redir_url']=$response['longurl'];
      }
            $stmt = $conn->prepare("INSERT INTO payments(reg_key,email,name,prid,phone,status,purpose,amount,eventid,accounit,registrants,timestamp) VALUES (?,?, ?, ?,?, ?, ?,?, ?, ?,?,?)");
            $stmt->bind_param("sssssssiiiis",$p0, $p1, $p2, $p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11);

            date_default_timezone_set('Asia/Kolkata');
            $date = date('m/d/Y h:i:s a', time());

            $p0=$_SESSION['reg_key'] ;

            $p1=$email ;
            $p2=$_SESSION['name'] ;
            $p3=$response['id'] ;
            $p4=$_SESSION['phone'] ;
            $p5="init" ;
            $p6=$purp ;
            $p7=$amount ;
            $p8=$evid ;
            $p9=$acco_units ;
            $p10=$registrants ;
            $p11=$date;
            $stmt->execute();
            if($stmt->affected_rows === 0)
              exit('Missing data error');


 }
 catch (Exception $e) {
     print('Error: ' . $e->getMessage());
     if($e->getMessage()!=NULL){
       date_default_timezone_set('Asia/Calcutta');
       $date = date('m/d/Y h:i:s a', time());
       $curl = curl_init();

       curl_setopt_array($curl, array(
         CURLOPT_URL => "https://www.fast2sms.com/dev/bulk?authorization=Ev2tKrgdNiCFOjeMySRHsaDA4b6T0JUQcZV937f5znGBp1PlxL6QDcEA8igklaOGKwoCpyqNf5zP1vFt&sender_id=FSTSMS&message=".urlencode("ERROR ".$date." ".$e->getMessage()."")."&language=english&route=p&numbers=".urlencode('8281582725'),
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => "",
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 30,
         CURLOPT_SSL_VERIFYHOST => 0,
         CURLOPT_SSL_VERIFYPEER => 0,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => "GET",
         CURLOPT_HTTPHEADER => array(
           "cache-control: no-cache"
         ),
       ));

       $response = curl_exec($curl);
       $err = curl_error($curl);

       curl_close($curl);
     }
 }

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Confirm Payment</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />

  <link href="payment/material.css" rel="stylesheet" />
  <link href="payment/vertical-nav.css" rel="stylesheet" />
  <style>
    body {
      /* background: url('https://i.ibb.co/pnsqFdz/event-list-bg.jpg') no-repeat center center fixed; */
        background-color: #252323;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      /* height: 100%;
      min-height: 100vh; */
      overflow: hidden;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class=" row">
      <div class="col-md-4 col-sm-12">
      </div>
      <div class=" col-md-4 col-sm-12" style="margin-top: 10%;">
        <div class=" card card-pricing">
          <div class="card-content">
            <h6 class="category ">CONFIRM PAYMENT</h6>
            <h1 class="card-title"><small>₹</small>  <?php echo $_SESSION['event_cost']?></h1>
            <ul style="margin-bottom: 10%;">
              <li><b>Event Registration : &nbsp;&nbsp;₹ <?php echo $_SESSION['event_cost']; ?> </li></b>
              <li><b>Pay your accommodation fee (Breakfast included) at the venue  </li></b>
            </ul>
            <div style="position: absolute;  left: 50%;  transform: translate(-50%, -50%) ">
          <a  href="<?php echo $_SESSION['redir_url']; ?>"  rel="im-checkout" data-behaviour="remote" data-style="dark" data-text="Pay Now" ></a>
          <script src="https://d2xwmjc4uy2hr5.cloudfront.net/im-embed/im-embed.min.js"></script>
        </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
        </div>
      </div>
    </div>
  </div>

</body>

</html>
