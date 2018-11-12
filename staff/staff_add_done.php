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
        /*$staff_name = @$_POST['name'];
        $staff_pass = @$_POST['pass'];
    
        $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
        $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');*/

        require_once('../common/common.php');
        $post = sanitize($_POST);

        $staff_name = @$post['name'];
        $staff_pass = @$post['pass'];

        //空データが入ってしまうため追加推薦
        if (empty($staff_name) or empty($staff_pass)) {
            exit();
        }

        include '../database.php';
        $sql = 'INSERT INTO mst_staff (name, password) VALUES (?, ?)';
        $stmt = $dbh->prepare($sql);
        $data[] = $staff_name;
        $data[] = $staff_pass;
        $stmt->execute($data);

        $dbh = null;
        
        print($staff_name.'さんを追加しました。<br />');

    } catch(Exception $e) {
        print('ただいま障害により大変ご迷惑をお掛けしております。');
        exit();
    }
?>

<a href="staff_list.php">戻る</a>

</body>
</html>