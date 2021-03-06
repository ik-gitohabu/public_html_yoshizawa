<?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['login']) == false) {
        print 'ログインされていません。<br />';
        print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
        exit();
    } else {
        print($_SESSION['staff_name']."さんログイン中<br /><br />");
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
		/*$pro_code = @$_POST['code'];
		$pro_name = @$_POST['name'];
		$pro_price = @$_POST['price'];
		$pro_gazou_name_old = @$_POST['gazou_name_old'];
		$pro_gazou_name = @$_POST['gazou_name'];

		$pro_code = htmlspecialchars($pro_code, ENT_QUOTES, 'UTF-8');
		$pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
		$pro_price = htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');
		$pro_gazou_name_old = htmlspecialchars($pro_gazou_name_old, ENT_QUOTES, 'UTF-8');
		$pro_gazou_name = htmlspecialchars($pro_gazou_name, ENT_QUOTES, 'UTF-8');*/

		require_once('../common/common.php');
		$post = sanitize($_POST);

		$pro_code = @$post['code'];
		$pro_name = @$post['name'];
		$pro_price = @$post['price'];
		$pro_gazou_name_old = @$post['gazou_name_old'];
		$pro_gazou_name = @$post['gazou_name'];
		
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

	} catch(Exception $e) {
		print('ただいま障害により大変ご迷惑をお掛けしております。');
		exit();
	}
?>

<a href="pro_list.php">戻る</a>

</body>
</html>