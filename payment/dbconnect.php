<?php
//$conn = mysqli_connect("localhost:3306","iedctkmc_hestiaU",'l$_Kj}kK-iScK5)e',"iedctkmc_hestiaDB");
$conn = mysqli_connect("localhost","root",'',"hestiaold");
$base_app_url="http://hestialocal.live/hestia2020/";
$base_app_title="Hestia 20";

// Check connection
if (mysqli_connect_errno())
  {
    exit("Failed to connect to DB");
  }
 
?>
