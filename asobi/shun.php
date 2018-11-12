<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>よしざわ農園</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

<?php
	$tsuki = $_POST['tsuki'];

	$yasai[] = ''; //0
	$yasai[] = 'ブロッコリー'; //1
	$yasai[] = 'カリフラワー'; //2
	$yasai[] = 'レタス'; //3
	$yasai[] = 'みつば'; //4
	$yasai[] = 'アスパラガス'; //5
	$yasai[] = 'セロリ'; //6
	$yasai[] = 'ナス'; //7
	$yasai[] = 'ピーマン'; //8
	$yasai[] = 'オクラ'; //9
	$yasai[] = 'さつまいも'; //10
	$yasai[] = '大根'; //11
	$yasai[] = 'ほうれんそう'; //12

	print $tsuki.'月は'.$yasai[$tsuki].'が旬です。';

?>

</body>
</html>