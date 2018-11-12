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

    //var_dump(@$_POST);

    /*$staff_name = @$_POST['name'];
    $staff_pass = @$_POST['pass'];
    $staff_pass2 = @$_POST['pass2'];
    //print($staff_name);

    $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
    $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');
    $staff_pass2 = htmlspecialchars($staff_pass2, ENT_QUOTES, 'UTF-8');*/
    //print($staff_name);

    require_once('../common/common.php');
    $post = sanitize($_POST);

    $staff_name = @$post['name'];
    $staff_pass = @$post['pass'];
    $staff_pass2 = @$post['pass2'];

    if($staff_name == '') {
        print('スタッフ名が入力されていません。<br />');
    } else {
        print('スタッフ名：'.$staff_name.'<br />');
    }

    if($staff_pass == '') {
        print('パスワードが入力されていません。<br />');
    }

    if ($staff_pass != $staff_pass2) {
        print('パスワードが一致しません。<br />');
    }

    if ($staff_name == '' || $staff_pass == '' || $staff_pass != $staff_pass2) {
        print('<form><input type="button" onclick="history.back()" value="戻る"></form>');
    } else {
        //var_dump($staff_pass);
        $staff_pass = md5($staff_pass);
        //var_dump($staff_pass);
        print('<form method="post" action="staff_add_done.php">');
        print('<input type="hidden" name="name" value="'.$staff_name.'" >');
        print('<input type="hidden" name="pass" value="'.$staff_pass.'" >');
        print('<br />');
        print('<input type="button" onclick="history.back()" value="戻る">');
        print('<input type="submit" value="OK">');
        print('<form>');
    }

?>

</body>
</html>