<?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['member_login']) == false) {
        print 'ようこそゲスト様 <a href="member_login.html">会員ログイン</a><br /><br />';
    } else {
		print('ようこそ'.$_SESSION['member_name'].'様 <a href="member_logout.php">ログアウト</a><br /><br />');
    }
?>
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

    try {
		include '../database.php';
		$sql = 'SELECT code, name, price FROM mst_product WHERE 1';
		$stmt = $dbh->prepare($sql);
		$stmt->execute();

		$dbh = null;

		print '<h1>商品一覧</h1>';

		while(true)
		{
			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
			if($rec == false)
			{
				break;
			}
			print '<a href="shop_product.php?procode='.$rec['code'].'">';
			print $rec['name'].'---';
			print $rec['price'].'円';
			print '</a>';
			print '<br />';
		}

	} catch(Exception $e) {
		print('ただいま障害により大変ご迷惑をお掛けしております。');
		exit();
	}

	print '<br />';
	print '<a href="shop_cartlook.php">カートを見る</a><br />';
	print '<a href="clear_cart.php">カートの中身を空にする</a><br />';

?>

</body>
</html>