<?php
   include 'dbconnect.php';
   include 'errors/error_handle.php';
   session_start();
    if(isset($_POST['json_data']))
    {
        $jstr=$_POST['json_data'];
        //var_dump($jstr);
    }
    else
    {
        header("Location:".$base_app_url);
        exit("nologin");
    }
   //$jstr='{"referral_code":"ref12","reg_email":"a@a.co","event_id":"2","accommodation_days":"23","emails":[{"email":"adarsh@digievo.in","acc":"y"},{"email":"b@b.co","acc":"y"},{"email":"amaljossy1@gmail.com","acc":"n"}]}';
   
   
   $sobj=json_decode($jstr,true);
   $refcode=array_key_exists('referral_code', $sobj) ? $sobj['referral_code'] : '';
   if(array_key_exists('reg_email', $sobj))
   {
       $email=$sobj['reg_email'];
   }
   else{
       exit('tampered email');
       
   }
   //echo sizeof($marray);
   $accodays=array_key_exists('accommodation_days', $sobj) ? $sobj['accommodation_days'] : '';
   $evid=$sobj['event_id'];

   $_SESSION['event_id']=$evid;

   if($sobj['accommodation_days']=='')
         $accoarray= array(); 
    else
           $accoarray= str_split($sobj['accommodation_days']);

            
   $marray=$sobj['emails'];
   if (array_key_exists(1,$marray))
   {
   if($marray[0]['email']==$marray[1]['email'])
   {
       exit("<h1>Unsupported app version. Update your app");
   }
   }
   //var_dump($marray);

   //echo microtime(true);
   $sql = 'SELECT fee_type FROM events where event_id='.$evid;
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0)
          {
             while($row = mysqli_fetch_assoc($result))
             {
               if($row['fee_type']=='head')
                  {$_SESSION['registrants']=sizeof($marray);}//session for pay.php
               elseif ($row['fee_type']=='team') {
                 {$_SESSION['registrants']=1;}//session for pay.php
               }
               else {
                  exit("invalid fee type");
               }
             }
          }
          else
          {
             exit("invalid event id");
          }

                    //find totl accounits
          $acco_units=0;
          for($i=0;$i<sizeof($marray);$i++)
          {
              if($marray[$i]["acc"]=='Y' || $marray[$i]["acc"]=='y')
              {
                  $acco_units+=sizeof($accoarray);//total ignorng dups

                  $tmail=$marray[$i]["email"];
                  $sql = 'SELECT accommodation FROM users where email='."'$tmail'";

                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0)
                  {
                      while($row = mysqli_fetch_assoc($result))
                      {
                          for($j=0; $j<sizeof($accoarray) ;$j++)
                          {
                            //echo '.a.'.$row["accommodation"].',b,'.$accoarray[$j].'<br>';

                               if( strpos( $row["accommodation"], $accoarray[$j] ) !== false)
                               {
                                  $acco_units--;
                                }
                          }
                      }

                  }

                }

            }
            //echo '<br>'.$acco_units;
            $_SESSION['acco_units']=$acco_units;


            $_SESSION['reg_key']=$email.microtime(true);
            //tempreg INSERT
            for($i=0;$i<sizeof($marray);$i++)
            {
              $stmt = $conn->prepare("INSERT INTO regtemp1(reg_key,event_id,reg_email,member_email,referral_code,acc) VALUES (?,?,?,?,?,?)");
              //var_dump($stmt);
              if(!$stmt)
              {exit("temporary issue with registration. check back soon");}
              $stmt->bind_param("sissss", $p1, $p2, $p3,$p4,$p5,$p6);
              $p1=$_SESSION['reg_key'] ;
              $p2=$evid ;
              $p3=$email ;
              $p4=$marray[$i]['email'] ;
              $p5=$refcode;
              $p6='';
              if($marray[$i]["acc"]=='Y')
              { 
                  //echo 't';
                  $p6=$accodays;
                  //echo $accodays;
              }
              //include('errors/logit.php');
              //logme($p1.'|'. $p2.'|'.$p3.'|'.$p4."|".$p5.'|'.$p6);
              $stmt->execute();
              if($stmt->affected_rows === 0)
                exit('Missing data error');
            }

            include 'pay.php';

?>
