<?php
// Report Errors
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

// Axe Web Service
$url = $_GET['url'];
exec('axe --chrome-options="no-sandbox" --stdout '.$url, $output, $retval);
print_r(json_encode($output, JSON_HEX_TAG));
?>
