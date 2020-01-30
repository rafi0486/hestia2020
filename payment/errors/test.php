<?php

include('error_handle.php');

echo $a.'test';
trigger_error("Fatal error", E_USER_ERROR);

?>