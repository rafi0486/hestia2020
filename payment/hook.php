<?php
/*
Basic PHP script to handle Instamojo RAP webhook.
*/

include 'dbconnect.php';
include 'errors/logit.php';
include 'errors/error_handle.php';
$data = $_POST;


 $logstr=implode("|",$data);
logme($logstr);



$mac_provided = $data['mac'];  // Get the MAC from the POST data
unset($data['mac']);  // Remove the MAC key from the data.
$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];
if($major >= 5 and $minor >= 4){
     ksort($data, SORT_STRING | SORT_FLAG_CASE);
}
else{
     uksort($data, 'strcasecmp');
}
// You can get the 'salt' from Instamojo's developers page(make sure to log in first): https://www.instamojo.com/developers
// Pass the 'salt' without <>
$mac_calculated = hash_hmac("sha1", implode("|", $data), "96c88551330c4d618e04815aa181b919");
if($mac_provided == $mac_calculated)
{
    if($data['status'] == "Credit")
    {
        // Payment was successful, mark it as successful in your database.
        // You can acess payment_request_id, purpose etc here.
        $sql = 'SELECT reg_key FROM payments where prid='."'".$data['payment_request_id']."'";
        $result = mysqli_query($conn, $sql);


        $sql = 'SELECT reg_key FROM payments where prid='."'".$data['payment_request_id']."'";
        $result = mysqli_query($conn, $sql);
        $rkey='';
        if (mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))

            {

                     $rkey=$row["reg_key"];

            }

            //registration copy
            $sql2 = 'INSERT INTO `registration`( `event_id`, `reg_email`, `member_email`, `file1`, `file2`, `referral_code`) SELECT  `event_id`, `reg_email`, `member_email`, `file1`, `file2`, `referral_code` FROM `regtemp1` WHERE reg_key='."'".$rkey."'";
            $result = mysqli_query($conn, $sql2);

            //update pid
            $sql3 = 'UPDATE payments SET pid='."'".$data['payment_id']."'".' where prid='."'".$data['payment_request_id']."'";
            $result3 = mysqli_query($conn, $sql3);

            //update status
            $sql3 = 'UPDATE payments SET status='."'".$data['status']."'".' where prid='."'".$data['payment_request_id']."'";
            $result3 = mysqli_query($conn, $sql3);

            //get mails
            $sql3 = 'SELECT reg_email,member_email FROM regtemp1 where reg_key='."'".$rkey."'";
            $result3 = mysqli_query($conn, $sql3);

         if (mysqli_num_rows($result3) > 0)
         {
             $i=0;
             $mails=array();
            while($row = mysqli_fetch_assoc($result3))
            {
                $omail=$row["reg_email"];

                if($i>0)
                {

                        $mails[$i-1]=$row["member_email"];
                }

                $i++;
            }
         }
         //insert reg to users
         for($j=0;$j<sizeof($mails);$j++)
         {
             $hsh=password_hash($mails[$j], PASSWORD_BCRYPT);
             $ml=$mails[$j];

                $sql0='INSERT IGNORE INTO users (email, hashcode) values('."'$ml'".','."'$hsh'".')' ;

            // $sql0='INSERT INTO users (email, hashcode) SELECT * FROM (SELECT'. "'$ml'".','. "'$hsh'".') AS tmp WHERE NOT EXISTS ( SELECT email FROM users WHERE email = '."'$ml'".') LIMIT 1';
            $result0 = mysqli_query($conn, $sql0);


         }

         //mail to unreg
         for($j=0;$j<sizeof($mails);$j++)
         {
             //$hsh=password_hash($mails[$j], PASSWORD_BCRYPT);
             $ml=$mails[$j];

                $sql5='SELECT phone FROM users where email='."'".$ml."'" ;

            // $sql0='INSERT INTO users (email, hashcode) SELECT * FROM (SELECT'. "'$ml'".','. "'$hsh'".') AS tmp WHERE NOT EXISTS ( SELECT email FROM users WHERE email = '."'$ml'".') LIMIT 1';
            $result5 = mysqli_query($conn, $sql5);
            if (mysqli_num_rows($result5) > 0)
            {
                while($row = mysqli_fetch_assoc($result5))

                {

                     $ph=$row["phone"];

                }


            }
            if ($ph == NULL)
            {
                $curl = curl_init();
            // Set some options - we are passing in a useragent too here
                curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $base_app_url.'payment/mail/teammembmail.php?email='.$ml.'',
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0"
                ]);
            // Send the request & save response to $resp
                $resp = curl_exec($curl);
                //echo $resp;
            // Close request to clear up some resources
                curl_close($curl);
            }
         }

         //add main regstrnt also
         $mails[sizeof($mails)]=$omail;

         //acco write to users
         for($j=0;$j<sizeof($mails);$j++)
         {
             $a1='';
             $a2='';
             $sql = 'SELECT accommodation FROM users WHERE email='."'".$mails[$j]."'";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) > 0)
            {
              while($row = mysqli_fetch_assoc($result))
              {
                    if($row['accommodation'])
                        {$a1=$row['accommodation'];}

              }
            }
             $sql = 'SELECT acc FROM regtemp1 WHERE member_email='."'".$mails[$j]."' AND reg_key="."'".$rkey."'";
             $result = mysqli_query($conn, $sql);

             if (mysqli_num_rows($result) > 0)
            {

              while($row = mysqli_fetch_assoc($result))
              {
                    if($row['acc'])
                        {$a2=$row['acc'];}
                }
            }
            $atot=$a1.$a2;
            $ains='';
            for($b=1;$b<5;$b++)
            {
                if (strpos($atot, strval($b)) !== false)
                {
                    $ains=$ains.$b;
                }
            }
            if($ains != '')
            {
                $sql = 'update users set accommodation='."'".$ains."'".'where email='."'".$mails[$j]."'";
             $result = mysqli_query($conn, $sql);
            }

         }


          //remove tempreg status
            $sql3 = 'DELETE from regtemp1 where reg_key='."'".$rkey."'";
            $result3 = mysqli_query($conn, $sql3);



        }

    }
    else
    {
        // Payment was unsuccessful, mark it as failed in your database.
        // You can acess payment_request_id, purpose etc here.
                    //update status
            $sql3 = 'UPDATE payments SET status='."'".$data['status']."'".' where prid='."'".$data['payment_request_id']."'";
            $result3 = mysqli_query($conn, $sql3);


    }
}
else
{
    echo "MAC mismatch";
}
?>
