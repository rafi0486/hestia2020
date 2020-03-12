<?php
// $conn = mysqli_connect("localhost","root",'',"hestia20_DB");
$conn = mysqli_connect("localhost","root",'Thameem@8123',"hestia19_DB");
$base_app_url="https://www.hestia.live/";
$base_app_title="Hestia 20";

// Check connection
if (mysqli_connect_errno())
  {
    exit("Failed to connect to DB");
  }

?>
