<?php
// $conn = mysqli_connect("localhost","root",'',"hestia20_DB");
$conn = mysqli_connect("localhost","root",'',"hestia20_DB");
$base_app_url="https://www.hestia.live/";
$base_app_title="Hestia 20";
// Test
$private_api='';
$private_token='';
$private_api2='';
$private_token2='';

// Original

// Check connection
if (mysqli_connect_errno())
  {
    exit("Failed to connect to DB");
  }

?>
