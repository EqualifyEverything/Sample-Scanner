
<?php
// Does not work.
$curl = curl_init('https://axe-equalify.ddev.site/index.php?url=example.com');

// Works
//$curl = curl_init('https://axe-equalify.ddev.site/test.json');

curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_PROTOCOLS, CURLPROTO_HTTP | CURLPROTO_HTTPS);
curl_setopt($curl, CURLOPT_REDIR_PROTOCOLS, CURLPROTO_HTTP | CURLPROTO_HTTPS);
curl_setopt($curl, CURLOPT_USERAGENT, 'Axe.Equalify');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  
$output = curl_exec($curl);
curl_close($curl);
?>

<code>

<?php
$axe_json_decoded = json_decode($output, true);

print_r($axe_json_decoded);
// foreach($axe_json_decoded as $item){
//     print_r($item);
//     echo '<br><br><br><br>';
// }
?>

</code>