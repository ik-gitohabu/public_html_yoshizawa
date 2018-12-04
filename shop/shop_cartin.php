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
		$flg = true; //商品がすでに入っている場合はfalse
		require_once('../common/common.php');
		$get = sanitize($_GET);
		$pro_code = $get['procode'];
		
		if (isset($_SESSION['cart']) == true) {
			$cart = $_SESSION['cart'];
			$kazu = $_SESSION['kazu'];
			if (in_array($pro_code, $cart) == true) {
				$flg = false;
			}
		}
		if ($flg) {
			$cart[] = $pro_code;
			$kazu[] = 1;
		}
		$_SESSION['cart'] = $cart;
		$_SESSION['kazu'] = $kazu;
		/*foreach($cart as $key=>$val) {
			print $val;
			print '<br />';
		}*/
		
	} catch(Exception $e) {
		print('ただいま障害により大変ご迷惑をお掛けしております。');
		exit();
	}
?>

<?php
	if ($flg) {
?>
カートに追加しました。
<?php
	} else {
?>
その商品はすでにカートに入っています。
<?php
	}
?>
<br />
<a href="shop_list.php">商品一覧に戻る</a>

</body>
</html>