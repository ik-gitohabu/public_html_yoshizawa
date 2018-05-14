<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>よしざわ農園</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../main.css" />
    <script src="../main.js"></script>
</head>
<body>
	<?php
		include '../session.php';
		
		//try {

			$pro_code = $_POST['code'];
			$pro_name = $_POST['name'];
			$pro_price = $_POST['price'];
			$pro_gazou_name_old = $_POST['gazou_name_old'];
			$pro_gazou_name = $_POST['gazou_name'];

			$pro_code = htmlspecialchars($pro_code);
			$pro_name = htmlspecialchars($pro_name);
			$pro_price = htmlspecialchars($pro_price);

			include '../database.php';
			$sql = 'UPDATE mst_product SET name = ?, price = ?, gazou = ? WHERE code = ?';
			$stmt = $dbh->prepare($sql);
			$data[] = $pro_name;
			$data[] = $pro_price;
			$data[] = $pro_gazou_name;
			$data[] = $pro_code;
			$stmt->execute($data);

			$dbh = null;

			if($pro_gazou_name_old != $pro_gazou_name) {
				if($pro_gazou_name_old != '') {
					unlink('./gazou/'.$pro_gazou_name_old);
				}
			}
			print '修正しました。<br />';
			
        /*}
        catch(Exception $e){
            print('ただいま障害により大変ご迷惑をお掛けしております。');
            exit();
        }*/
	?>
	<a href="pro_list.php">戻る</a>
</body>
</html>