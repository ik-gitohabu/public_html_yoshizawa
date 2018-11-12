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
	
	/*$pro_code = @$_POST['code'];
	$pro_name = @$_POST['name'];
	$pro_price = @$_POST['price'];
	$pro_gazou_name_old = @$_POST['gazou_name_old'];
	$pro_gazou = $_FILES['gazou'];

	$pro_code = htmlspecialchars($pro_code, ENT_QUOTES, 'UTF-8');
	$pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
	$pro_price = htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');
	$pro_gazou_name_old = htmlspecialchars($pro_gazou_name_old, ENT_QUOTES, 'UTF-8');*/

	require_once('../common/common.php');
	$post = sanitize($_POST);

	$pro_code = @$post['code'];
	$pro_name = @$post['name'];
	$pro_price = @$post['price'];
	$pro_gazou_name_old = @$post['gazou_name_old'];
	$pro_gazou = $_FILES['gazou'];

	//画像名をタイムスタンプとランダム関数で自動命名
	$pro_gazou_name_new = new DateTime();
	$pro_gazou_name_new = $pro_gazou_name_new->getTimestamp().rand();

	if($pro_name == '') {
		print '商品名が入力されていません。<br />';
	} else {
		print '商品名:';
		print $pro_name;
		print '<br />';
	}

	if(preg_match('/^[0-9]+$/',$pro_price) == 0) {
		print '価格をきちんと入力してください。<br />';
	} else {
		print '価格:';
		print $pro_price;
		print '円<br />';
	}

	if($pro_gazou['size'] > 0) {
		if($pro_gazou['size'] > 1000000) {
			print '画像が大き過ぎます';
		} else {
			move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou_name_new);
			print '<img src="./gazou/'.$pro_gazou_name_new.'">';
			print '<br />';
		}
	} else {
		//ファイルがアップロードされなかった場合edit_doneでunlink回避が必要
		$pro_gazou_name_new = $pro_gazou_name_old;
	}

	if($pro_name=='' || preg_match('/^[0-9]+$/',$pro_price)==0 || $pro_gazou['size']>1000000) {
		print '<form>';
		print '<input type="button" onclick="history.back()" value="戻る">';
		print '</form>';
	} else {
		print '上記のように変更します。<br />';
		print '<form method="post" action="pro_edit_done.php">';
		print '<input type="hidden" name="code" value="'.$pro_code.'">';
		print '<input type="hidden" name="name" value="'.$pro_name.'">';
		print '<input type="hidden" name="price" value="'.$pro_price.'">';
		print '<input type="hidden" name="gazou_name_old" value="'.$pro_gazou_name_old.'">';
		print '<input type="hidden" name="gazou_name" value="'.$pro_gazou_name_new.'">';
		print '<br />';
		print '<input type="button" onclick="history.back()" value="戻る">';
		print '<input type="submit" value="OK">';
		print '</form>';
	}	
?>

</body>
</html>