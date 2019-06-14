<?php
//$currentPwd='80cbbe57c80791e76fc1814c32f2f43fe7a7f7087376dac13b27ca388b8c5f72bf3a10400f4a4c354d9888a025deccd63dd491036c76341e299672f6fccf8a6a'; //FmExport2019!
$currentPwd='0a9fe7cc173c53cb7c7449a9bedf4512053dca33d219ff2aba6afa759f5bbac273b38cd0194a2c7c69bf28cf9ad78d060bbcad84ee5a40fc483603677028b580'; //pollo
$file=$_FILES['players'];

$homepage = file_get_contents($file['tmp_name']);
//$password=hash('sha512', 'FmExport2019!');
$password=hash('sha512', $_POST['token']);
if($password===$currentPwd){

	$doc = new DOMDocument();

	$doc->loadHTML($homepage);

	$ols = $doc->getElementsByTagName('table');

	foreach ($ols as $ol) {
		$nodes = $ol->getElementsByTagName('tr');
		foreach ($nodes as $node) {
			$row=$node->getElementsByTagName('td');
			foreach ($row as $td) {
				echo trim($td->nodeValue)."<br>";
			}	

		}
	}
}else{
	session_start();
	$location='./';
	$_SESSION['message'] = 'Token Errato';
	header("Location: $location");
}




















