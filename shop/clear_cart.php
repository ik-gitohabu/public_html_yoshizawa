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

	カートを空にしました。<br />

<?php
	include '../footer.php';
?>