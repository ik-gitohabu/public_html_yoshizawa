<?php
	include '../session_guest.php';
	include '../header.php';
	include '../menu_guest.php';

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
	//print '<a href="clear_cart.php">カートの中身を空にする</a><br />';

	include '../footer.php';
?>