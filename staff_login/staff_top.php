<?php
    session_start();
    //var_dump($_SESSION);
    session_regenerate_id(true);
    //var_dump(session_name());
    //var_dump($_COOKIE[session_name()]);
    if(isset($_SESSION['login']) == false) {
        print 'ログインされていません。<br />';
        print '<a href="staff_login.html">ログイン画面へ</a>';
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
	
	<h1>ショップ管理トップメニュー</h1>
	<br />
	<a href="../staff/staff_list.php">スタッフ管理</a><br />
	<br />
	<a href="../product/pro_list.php">商品管理</a><br />
	<br />
    <a href="../order/order_download.php">注文ダウンロード</a><br />
	<br />
	<a href="../asobi/shun.html">月ごとの旬の野菜</a><br />
	<br />
	<a href="../asobi/hoshi.html">有名な天体</a><br />
	<br />
	<a href="../asobi/gakunen.html">学年ごとに校舎案内</a><br />
	<br />
	<a href="../asobi/gengo.html">西暦から元号判定</a><br />
	<br />
	<a href="staff_logout.php">ログアウト</a><br />

</body>
</html>