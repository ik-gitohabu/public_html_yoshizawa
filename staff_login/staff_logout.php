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
		session_start();
		$_SESSION = array();
		if(isset($_COOKIE[session_name()]) == true) {
			setcookie(session_name(), '', time()-42000, '/');
		}
		session_destroy();
	?>

	ログアウトしました。<br />
	<br />
	<a href="../staff_login/staff_login.php">ログイン画面へ</a>

</body>
</html>