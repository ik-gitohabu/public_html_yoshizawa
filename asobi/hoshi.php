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
	$mbango = $_POST['mbango'];

	$hoshi['M1'] = 'カニ星雲';
	$hoshi['M31'] = 'アンドロメダ大星雲';
	$hoshi['M42'] = 'オリオン大星雲';
	$hoshi['M45'] = 'すばる';
	$hoshi['M57'] = 'ドーナツ星雲';

	//var_dump($hoshi);

	foreach ($hoshi as $key=>$val) {
		print $key.'は'.$val.'<br />';
	}

	print 'あなたが選んだ星は、'.$hoshi[$mbango];

?>

</body>
</html>