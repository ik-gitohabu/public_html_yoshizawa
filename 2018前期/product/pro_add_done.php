<?php
	include '../session.php';
	include '../header.php';
	include '../menu.php';

    try {
		$post = sanitize($_POST);
		$pro_name = @$post['name'];
		$pro_price = @$post['price'];
		$pro_gazou_name = @$post['gazou_name'];

        //空データが入ってしまうため追加推薦
        if (empty($pro_name) or empty($pro_price)) {
            exit();
        }

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