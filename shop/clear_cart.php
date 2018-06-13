<?php
	session_start();
	$_SESSION = array();
	if(isset($_COOKIE[session_name()]) == true) {
		setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
	include '../session_guest.php';
	include '../header.php';
	include '../menu_guest.php';
?>

カートを空にしました。
<br />
<a href="shop_list.php">商品一覧に戻る</a>

<?php
	include '../footer.php';
?>