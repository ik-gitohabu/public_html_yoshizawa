<?php
	session_start();
	$_SESSION = array();
	if(isset($_COOKIE[session_name()]) == true) {
		setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
	include '../header.php';
?>

	ログアウトしました。<br />
	<br />
	<a href="../staff_login/staff_login.php">ログイン画面へ</a>

<?php
	include '../footer.php';
?>