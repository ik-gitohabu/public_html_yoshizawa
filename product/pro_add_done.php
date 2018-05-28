<?php
	include '../session.php';
	include '../header.php';
	include '../menu.php';

    try {   
		$pro_name = $_POST['name'];
		$pro_price = $_POST['price'];
		$pro_gazou_name = $_POST['gazou_name'];

		$pro_name = htmlspecialchars($pro_name);
		$pro_price = htmlspecialchars($pro_price);
		$pro_gazou_name = htmlspecialchars($pro_gazou_name);

		include '../database.php';
		$sql = 'INSERT INTO mst_product(name, price, gazou) VALUES (?, ?, ?)';
		$stmt = $dbh->prepare($sql);
		$data[] = $pro_name;
		$data[] = $pro_price;
		$data[] = $pro_gazou_name;
		$stmt->execute($data);
		$dbh = null;

		print $pro_name;
		print 'を追加しました。<br />';

	} catch(Exception $e) {
		print('ただいま障害により大変ご迷惑をお掛けしております。');
		exit();
	}
?>

<a href="pro_list.php">戻る</a>

<?php
    include '../footer.php';
?>