<?php
// Report Errors
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

// Axe Web Service
$url = $_GET['url'];
exec('axe '.$url.' --chromedriver-path /usr/local/bin/chromedriver --chrome-options="no-sandbox" --stdout', $output, $retval);
foreach($output as $item){
  print_r(htmlspecialchars($item));
}
?>
