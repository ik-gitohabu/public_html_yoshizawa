<?php
	include '../session.php';
	include '../header.php';
	include '../menu.php';

    try {
		include '../database.php';
		$sql = 'SELECT code, name, price FROM mst_product WHERE 1';
		$stmt = $dbh->prepare($sql);
		$stmt->execute();

		$dbh = null;

		print '<h1>商品一覧</h1>';

		print '<form method="post" action="pro_branch.php">';
		while(true)
		{
			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
			if($rec == false)
			{
				break;
			}
			print '<label for="'.$rec['code'].'"><input type="radio" name="procode" value="'.$rec['code'].'" id="'.$rec['code'].'" >';
			print $rec['name'].'---';
			print $rec['price'].'円';
			print '</label><br />';
		}
		print '<input type="submit" name="disp" value="参照">';
		print '<input type="submit" name="add" value="追加">';
		print '<input type="submit" name="edit" value="修正">';
		print '<input type="submit" name="delete" value="削除">';
		print '</form>';
		print '<br />';
        print '<a href="../staff_login/staff_top.php">トップメニューへ</a><br />';

	} catch(Exception $e) {
		print('ただいま障害により大変ご迷惑をお掛けしております。');
		exit();
	}

	include '../footer.php';
?>