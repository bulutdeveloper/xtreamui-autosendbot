<?php
 
if ($_POST['submit']) {
    $mac_id = $_POST['mac_id'];
    $iptv_link = $_POST['iptv_link'];
 
 
 
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, 'https://homeiptv.com/importChannels.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "-----------------------------3314234750580133318607585816\r\nContent-Disposition: form-data; name=\"file\"\r\n\r\nundefined\r\n-----------------------------3314234750580133318607585816\r\nContent-Disposition: form-data; name=\"tvId\"\r\n\r\n$mac_id\r\n-----------------------------3314234750580133318607585816\r\nContent-Disposition: form-data; name=\"m3_url\"\r\n\r\n$iptv_link\r\n-----------------------------3314234750580133318607585816\r\nContent-Disposition: form-data; name=\"g-recaptcha-response\"\r\n\r\nundefined\r\n-----------------------------3314234750580133318607585816\r\nContent-Disposition: form-data; name=\"epgUrl\"\r\n\r\n\r\n-----------------------------3314234750580133318607585816\r\nContent-Disposition: form-data; name=\"country\"\r\n\r\nUSSR\r\n-----------------------------3314234750580133318607585816--\r\n");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 
$headers = array();
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:81.0) Gecko/20100101 Firefox/81.0';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.8,en-US;q=0.5,en;q=0.3';
$headers[] = 'X-Requested-With: XMLHttpRequest';
$headers[] = 'Content-Type: multipart/form-data; boundary=---------------------------3314234750580133318607585816';
$headers[] = 'Origin: https://homeiptv.com';
$headers[] = 'Dnt: 1';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Referer: https://homeiptv.com/';
$headers[] = 'Cookie: __cfduid=deec69aeac3f2e3cd5f63109707bf009e1603056799';
$headers[] = 'Pragma: no-cache';
$headers[] = 'Cache-Control: no-cache';
$headers[] = 'Te: Trailers';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 
$result = curl_exec($ch);
if (curl_errno($ch)) {
var_dump(curl_error($ch));
}
curl_close($ch);
$real_result = json_decode($result, true);
if ($real_result['import']=='true' && $real_result['status']=='success') {
    echo 'Başarıyla aktarıldı!';
} else {
    echo 'Bir problem meydana geldi.';
}
echo '<br>';
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeIptv</title>
</head>
<body>
    <form method="post">
        <label for="mac_id">MAC ID</label>
        <br>
        <input type="text" name="mac_id" id="mac_id" placeholder="5a44w324asd">
        <br>
        <label for="iptv_link">iPTV Link</label>
        <br>
        <input type="text" name="iptv_link" id="iptv_link" placeholder="iptv linkiniz">
        <br>
        <button type="submit" id="submit" name="submit" value="1">Gönder</button>
    </form>
</body>
</html>