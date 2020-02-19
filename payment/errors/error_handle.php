<?php
register_shutdown_function( "fatal_handler" );

function fatal_handler() {
    $errfile = "unknown file";
    $errstr  = "shutdown";
    $errno   = E_CORE_ERROR;
    $errline = 0;

    $error = error_get_last();

    if( $error !== NULL) {
        $errno   = $error["type"];
        $errfile = $error["file"];
        $errline = $error["line"];
        $errstr  = $error["message"];
    include('logit.php');
    $str= " ".$errno."|".$errfile."|".$errline."|".$errstr;
        //write_error(format_error( $errno, $errstr, $errfile, $errline));
        errormsg($str);
    }
}

function errormsg()
{
date_default_timezone_set('Asia/Calcutta');
$date = date('m/d/Y h:i:s a', time());
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk?authorization=Ev2tKrgdNiCFOjeMySRHsaDA4b6T0JUQcZV937f5znGBp1PlxL6QDcEA8igklaOGKwoCpyqNf5zP1vFt&sender_id=FSTSMS&message=".urlencode("ERROR ".$date." ".$str."")."&language=english&route=p&numbers=".urlencode('8281582725'),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

}
// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   echo $response;
// }

// curl_setopt_array($curl, array(
//   CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?route=4&sender=HESTIA&mobiles=918606020486,918281582725&authkey=168668AYTI6RoQyo5986a03e&message= ERROR ".$date." ".$str."&country=91",
//   CURLOPT_RETURNTRANSFER => true,
//   CURLOPT_ENCODING => "",
//   CURLOPT_MAXREDIRS => 10,
//   CURLOPT_TIMEOUT => 30,
//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//   CURLOPT_CUSTOMREQUEST => "GET",
//   CURLOPT_SSL_VERIFYHOST => 0,
//   CURLOPT_SSL_VERIFYPEER => 0,
// ));
//
// $response = curl_exec($curl);
// $err = curl_error($curl);
//
// curl_close($curl);

// }


    function format_error( $errno, $errstr, $errfile, $errline ) {
    $trace = print_r( debug_backtrace( false ), true );

    $content = "
    <table>
        <thead><th>Item</th><th>Description</th></thead>
        <tbody>
            <tr>
                <th>Error</th>
                <td><pre>$errstr</pre></td>
            </tr>
            <tr>
                <th>Errno</th>
                <td><pre>$errno</pre></td>
            </tr>
            <tr>
                <th>File</th>
                <td>$errfile</td>
            </tr>
            <tr>
                <th>Line</th>
                <td>$errline</td>
            </tr>
            <tr>
                <th>Trace</th>
                <td><pre>$trace</pre></td>
            </tr>
        </tbody>
    </table>";
    $fp = fopen('hest_error.txt', 'w');
fwrite($fp, $content);
fclose($fp);
}


?>
