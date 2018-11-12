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
		/*$pro_code = $_GET['procode'];

		$pro_code = htmlspecialchars($pro_code, ENT_QUOTES, 'UTF-8');*/

		require_once('../common/common.php');
		$get = sanitize($_GET);

		$pro_code = $get['procode'];
		
		include '../database.php';
		$sql = 'SELECT name,gazou FROM mst_product WHERE code = ?';
		$stmt = $dbh->prepare($sql);
		$data[] = $pro_code;
		$stmt->execute($data);

		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		$pro_name = $rec['name'];
		$pro_gazou_name = $rec['gazou'];

		$dbh = null;

		if($pro_gazou_name == '') {
			$disp_gazou = '';
		} else {
			$disp_gazou = '<img src="./gazou/'.$pro_gazou_name.'">';
		}
		
	} catch(Exception $e) {
		print('ただいま障害により大変ご迷惑をお掛けしております。');
		exit();
	}
?>

<h1>商品スタッフ削除</h1>
商品コード<br />
<?php print $pro_code; ?>
<br />
商品名<br />
<?php print $pro_name; ?>
<br />
<?php print $disp_gazou; ?>
<br />
この商品を削除してよろしいですか？<br />
<br />
<form method="post" action="pro_delete_done.php">
<input type="hidden" name="code" value="<?php print $pro_code; ?>">
<input type="hidden" name="gazou_name" value="<?php print $pro_gazou_name; ?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

</body>
</html>