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
    
<?php

    try {
        /*$staff_code = @$_POST['code'];

        $staff_code = htmlspecialchars($staff_code, ENT_QUOTES, 'UTF-8');*/

        require_once('../common/common.php');
        $post = sanitize($_POST);

        $staff_code = @$post['code'];

        include '../database.php';
        $sql = 'DELETE FROM mst_staff WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $staff_code;
        $stmt->execute($data);

        $dbh = null;

    } catch(Exception $e) {
        print('ただいま障害により大変ご迷惑をお掛けしております。');
        exit();
    }
?>

削除しました。<br /><br />
<a href="staff_list.php">戻る</a>

</body>
</html>