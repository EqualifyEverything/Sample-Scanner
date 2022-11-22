
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
function escapeHtml(unsafe)
{
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
 }


axe.run(document, function (err, results) {
    if (err) throw err;
    document.querySelector('html').remove();

    document.open ();
    document.write(JSON.stringify(escapeHtml(results)));
    document.close ();
    // console.log(results);
});
</script>