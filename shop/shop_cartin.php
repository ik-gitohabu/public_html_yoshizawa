<?php
	include '../session_guest.php';
	include '../header.php';
	include '../menu_guest.php';

    try {
		$pro_code = $_GET['procode'];
		if (isset($_SESSION['cart']) == true) {
			$cart = $_SESSION['cart'];
			$kazu = $_SESSION['kazu'];
		}
		$cart[] = $pro_code;
		$kazu[] = 1;
		$_SESSION['cart'] = $cart;
		$_SESSION['kazu'] = $kazu;
		foreach($cart as $key=>$val) {
			print $val;
			print '<br />';
		}
		
	} catch(Exception $e) {
		print('ただいま障害により大変ご迷惑をお掛けしております。');
		exit();
	}
?>

カートに追加しました。
<br />
<a href="shop_list.php">商品一覧に戻る</a>

<?php
    include '../footer.php';
?>