<?php
// $conn = mysqli_connect("localhost","root",'',"hestia20_DB");
$conn = mysqli_connect("localhost","root",'Thameem@8123',"hestia20_DB");
$base_app_url="https://www.hestia.live/";
$base_app_title="Hestia 20";
//Test
// $private_api='test_c04e674aadf996fd4a3692a0694';
// $private_token='test_682490e7df25b5fad01f575d09d';
// $private_api2='test_c04e674aadf996fd4a3692a0694';
// $private_token2='test_682490e7df25b5fad01f575d09d';

// Original
$private_api='2f0b906cf313799b00bbaecddf708d5f';
$private_token='5e729a651a9842419f815fdf53232a9e';
$private_api2='2f0b906cf313799b00bbaecddf708d5f';
$private_token2='5e729a651a9842419f815fdf53232a9e';
// Check connection
if (mysqli_connect_errno())
  {
    exit("Failed to connect to DB");
  }

?>
