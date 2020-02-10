<?php
include './../dbconnect.php';
require("sendgrid-php/sendgrid-php.php");
$mails=array();

if(isset($_GET['eid']))
{
    $eid=$_GET['eid'];
}
else
    exit("modded Mrequest");

$sql = 'SELECT title FROM events where event_id='.$eid;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)) {
               $title=$row['title'];
    }
} 
else {
    exit("invalid Mrequest");
}

$sql = 'SELECT member_email FROM registration where event_id='.$eid;
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
               $mails[]=$row['member_email'];
    }
} 
else {
    exit("invalid Mrequest");
}

$arrlength = count($mails);
for($x = 0; $x < $arrlength; $x++) {

$curl = curl_init();
$url= 'https://www.hestia.live/payment/mail/certmailsend.php?email='.$mails[$x].'&title='.$title;
$url = str_replace(" ", '%20', $url);
            // Set some options - we are passing in a useragent too here
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0"
            ]);
            // Send the request & save response to $resp
            $resp = curl_exec($curl);
            //echo $resp;
            // Close request to clear up some resources
            curl_close($curl);
            
}
            ?>