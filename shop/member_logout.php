<?php
	session_start();
	$_SESSION = array();
	if(isset($_COOKIE[session_name()]) == true) {
		setcookie(session_name(), '', time()-42000, '/');
	}
	session_destroy();
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

	ログアウトしました。<br />
	<br />
	<a href="../shop/shop_list.php">商品一覧へ</a>

</body>
</html>