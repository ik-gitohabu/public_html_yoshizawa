<?php
	include '../session_guest.php';
	include '../header.php';
	include '../menu_guest.php';

    try {
		$flg = true; //商品がすでに入っている場合はfalse
		$pro_code = $_GET['procode'];
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

<?php
    include '../footer.php';
?>