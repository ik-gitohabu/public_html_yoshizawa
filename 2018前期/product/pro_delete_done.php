<?php
	include '../session.php';
	include '../header.php';
	include '../menu.php';

    try {

		$pro_code = $_POST['code'];
		$pro_gazou_name = $_POST['gazou_name'];

		include '../database.php';
		$sql = 'DELETE FROM mst_product WHERE code = ?';
		$stmt = $dbh->prepare($sql);
		$data[] = $pro_code;
		$stmt->execute($data);

		$dbh = null;

		if($pro_gazou_name != ''){
			unlink('./gazou/'.$pro_gazou_name);
		}

	} catch(Exception $e) {
		print('ただいま障害により大変ご迷惑をお掛けしております。');
		exit();
	}
?>

削除しました。<br />
<br />
<a href="pro_list.php"> 戻る</a>

<?php
    include '../footer.php';
?>