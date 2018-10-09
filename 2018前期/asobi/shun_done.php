<?php
	include '../session.php';
	include '../header.php';
	include '../menu.php';

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

	include '../footer.php';
?>