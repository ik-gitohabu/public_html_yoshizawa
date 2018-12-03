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

	$error = array();
	
    try {
		require_once('../common/common.php');
		$get = sanitize($_GET);
		$error = @$get['error'];

		$cart = array();
		$kazu = array();
		if (isset($_SESSION['cart']) == true) {
			$cart = $_SESSION['cart'];
			$kazu = $_SESSION['kazu'];
			//var_dump($cart);
			//exit();
		}
		$max = count($cart);

		include '../database.php';
		foreach($cart as $key => $val) {
			$sql = 'SELECT name, price, gazou FROM mst_product WHERE code = ?';
			$stmt = $dbh->prepare($sql);
			$data[0] = $val;
			$stmt->execute($data);

			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
			$pro_name[] = $rec['name'];
			$pro_price[] = $rec['price'];
			if ($rec['gazou'] == '') {
				$pro_gazou[] = '';
			} else {
				$pro_gazou[] = '<img src="../product/gazou/'.$rec['gazou'].'">';
			}
		}
		$dbh = null;

		/*for($i = 0; $i < $max; $i++) {
			print $pro_name[$i];
			print $pro_gazou[$i];
			print $pro_price[$i].'円';
			print '<br />';
		}*/
	} catch(Exception $e) {
		print('ただいま障害により大変ご迷惑をお掛けしております。');
		exit();
	}
?>

<?php
	if ($error) {
		print '<p class="error">'.str_replace("/n", "<br />", $error).'</p>';
	}
	if ($max == 0){
?>
カートに商品が入っていません。
<br />
<?php
	} else {
?>

<h1>カートの中身</h1>
<form method="post" action="kazu_change.php">
<table>
<tr>
<th>商品</th>
<th>画像</th>
<th>価格</th>
<th>数量</th>
<th>小計</th>
<th>削除</th>
</tr>
<?php
		for($i = 0; $i < $max; $i++) {
?>
<tr>
<th><?=$pro_name[$i]?></th>
<td><?=$pro_gazou[$i]?></td>
<td><?=$pro_price[$i]?>円</td>
<td><input type="text" name="kazu<?=$i?>" value="<?=$kazu[$i]?>">個</td>
<td><?=$pro_price[$i] * $kazu[$i]?>円</td>
<td><input type="checkbox" name="sakujo<?=$i?>"></td>
</tr>
<?php
		}
?>
</table>
<input type="hidden" name="max" value="<?=$max?>">
<input type="submit" value="数量変更"><br />
</form>

<br />
<a href="shop_form.php">ご購入手続きに進む</a>
<br />

<?php
		if (isset($_SESSION["member_login"]) == true) {
			print '<a href="shop_kantan_check.php">会員かんたん注文へ進む</a><br />';
		}
	}
?>

<a href="shop_list.php">商品一覧に戻る</a>

</body>
</html>