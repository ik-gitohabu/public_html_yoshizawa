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

ダウンロードしたい注文日を選んでください。<br />
<form method="post" action="order_download_done.php">
<?php require_once('../common/common.php'); ?>
<?php pulldown_year(); ?>
年
<?php pulldown_month(); ?>
月
<?php pulldown_day(); ?>
日<br />
<br />
<input type="submit" value="ダウンロードへ">
</form>

</body>
</html>