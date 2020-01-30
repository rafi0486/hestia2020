<?php
//htodo get payment request id and paymnt id from instamojo. call Get Payment Request Details api and get user details as well as paymnt success. compare it with local user id and verify and display success
$prid=$_GET["payment_request_id"];
$pstatus=$_GET["payment_status"];
$pid=$_GET["payment_id"];

 include 'src/Instamojo.php';
//htodo get categid eventid and userid as params
$api = new Instamojo\Instamojo('b2188a4239de0355ac97a61d19d185f4', 'd44083fd641f6527043a57caa0b156fe');
 try {
    $response = $api->paymentRequestStatus($prid);
    //print_r($response);
    //print('<br>');
    if($response[payments][0][status] == "Credit" && $pstatus== "Credit" && $response[payments][0][payment_id] == $pid)
    {
        include 'psuccess.html';

    }
    else
    {
        include 'pfail.html';
    }
}
catch (Exception $e) {
            include 'pfail.html';

    //print('Error: ' . $e->getMessage());
}

?> 
