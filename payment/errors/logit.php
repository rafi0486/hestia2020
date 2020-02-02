<?php

function logme($logstr='')
{
    
    // Getting the information
$ipaddress = $_SERVER['REMOTE_ADDR'];
$page = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}"; 
if(!empty($_SERVER['QUERY_STRING']))
{$page .=$_SERVER['QUERY_STRING']; }
$referrer = $_SERVER['HTTP_REFERER'];
date_default_timezone_set('Asia/Calcutta');
$datetime = date('m/d/Y h:i:s a', time());
$useragent = $_SERVER['HTTP_USER_AGENT'];
$remotehost = @getHostByAddr($ipaddress);
// Create log line
$logline = $ipaddress . '|' . $referrer . '|' . $datetime . '|' . $useragent . '|' . $remotehost . '|' . $page . '|'.$logstr ."\n";

// Write to log file:
$logfile = 'hest20logfile.txt';

// Open the log file in "Append" mode
if (!$handle = fopen($logfile, 'a+')) {
    die("error creating log file");
}

// Write $logline to our logfile.
if (fwrite($handle, $logline) === FALSE) {
    die("error writing log file");
}
  
fclose($handle);
    
    
}


?>