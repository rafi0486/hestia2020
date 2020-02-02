<?php
//$conn = mysqli_connect("localhost:3306","iedctkmc_hestiaU",'l$_Kj}kK-iScK5)e',"iedctkmc_hestiaDB");
$conn = mysqli_connect("localhost","root",'',"hestiaold");
$base_app_url="http://hestialocal.live/hestia2020/";
$base_app_title="Hestia 20";
$private_api='test_67e4b4a82b8d43d3fa1e4053b2f';
$private_token='test_893a46e8fa71c68603a657320f9';
$private_api2='test_67e4b4a82b8d43d3fa1e4053b2f';
$private_token2='test_893a46e8fa71c68603a657320f9';

// Check connection
if (mysqli_connect_errno())
  {
    exit("Failed to connect to DB");
  }
 
?>
