<?php 

if (!isset($_POST['mac']) || !isset($_POST['url'])) {?>
	<form method="POST">
		<input type="text" name="mac" placeholder="Mac Adresiniz"> <br><br>
		<input type="text" name="url" placeholder="Yayın Adresi"> <br><br>
		<input type="submit">
	</form>
	<?php
}else{

	function SaveRoyalIpTv($mac='',$url='')
	{
		$data = array(
			'mac' => $mac,
			'url' => $url,

		);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://www.royaliptvapp.com/php/addMac.php');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

		$headers = array();
		$headers[] = 'Authority: www.royaliptvapp.com';
		$headers[] = 'Pragma: no-cache';
		$headers[] = 'Cache-Control: no-cache';
		$headers[] = 'Accept: */*';
		$headers[] = 'Sec-Fetch-Dest: empty';
		$headers[] = 'X-Requested-With: XMLHttpRequest';
		$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36';
		$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
		$headers[] = 'Origin: https://www.royaliptvapp.com';
		$headers[] = 'Sec-Fetch-Site: same-origin';
		$headers[] = 'Sec-Fetch-Mode: cors';
		$headers[] = 'Referer: https://www.royaliptvapp.com/myList.html';
		$headers[] = 'Accept-Language: tr,en;q=0.9';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		return $result;
	}

	$sonuc = trim(SaveRoyalIpTv($_POST['mac'],$_POST['url']));

	if ($sonuc == mb_strtoupper($_POST['mac'])) {
		echo "Başarılı";
	}else{
		echo "Başarısız";
	}
}