
<?php
$curl = curl_init($_GET['url']);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_PROTOCOLS, CURLPROTO_HTTP | CURLPROTO_HTTPS);
curl_setopt($curl, CURLOPT_REDIR_PROTOCOLS, CURLPROTO_HTTP | CURLPROTO_HTTPS);
curl_setopt($curl, CURLOPT_USERAGENT, 'Axe.Equalify');
curl_exec($curl);
curl_close($curl);
?>

<script src="axe.min.js"></script>
<script>
axe.run(document, function (err, results) {
    if (err) throw err;
    document.querySelector('html').remove();
    const violations = JSON.stringify(results.violations);
    const violations_escaped = violations.replaceAll('&', '&amp;').replaceAll('<', '&lt;').replaceAll('>', '&gt;').replaceAll('"', '&quot;').replaceAll("'", '&#039;');
    document.open ();
    document.write('<pre>'+violations_escaped+'</pre>');
    document.close ();
});
</script>