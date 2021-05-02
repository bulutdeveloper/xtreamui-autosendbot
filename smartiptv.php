<?php 

if (!isset($_POST['mac']) || !isset($_POST['url'])) {?>
	<form method="POST">
		<input type="text" name="mac" placeholder="Mac Adresiniz"> <br><br>
		<input type="text" name="url" placeholder="Yayın Adresi"> <br><br>
		<input type="text" name="pin" placeholder="Mac Pini"> <br><br>
		<input type="submit">
	</form>
	<?php
}else{

	function SaveSipTv($mac='',$url='',$pin='')
	{
		$data = array(
			'mac' => $mac,
			'sel_countries' => "USSR",
			'sel_logos' => 0,
			'keep' => "on",
			'lang' => "en",
			'url1' => $url,
			'epg1' => "",
			'pin' => $pin,
			'url_count' => 1,
			'file_selected' => 0,
			'plist_order' => 0,

		);
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://siptv.eu/scripts/up_url_only.php');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

		$headers = array();
		$headers[] = 'Connection: keep-alive';
		$headers[] = 'Pragma: no-cache';
		$headers[] = 'Cache-Control: no-cache';
		$headers[] = 'Accept: */*';
		$headers[] = 'Sec-Fetch-Dest: empty';
		$headers[] = 'X-Requested-With: XMLHttpRequest';
		$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36';
		$headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
		$headers[] = 'Origin: https://siptv.eu';
		$headers[] = 'Sec-Fetch-Site: same-origin';
		$headers[] = 'Sec-Fetch-Mode: cors';
		$headers[] = 'Referer: https://siptv.eu/mylist/';
		$headers[] = 'Accept-Language: tr,en;q=0.9';
		$headers[] = 'Cookie: origin=valid; captcha=1';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}


	print_r(SaveSipTv($_POST['mac'],$_POST['url'],$_POST['pin']));
}