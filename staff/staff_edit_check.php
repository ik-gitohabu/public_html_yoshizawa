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
    
    $staff_code = @$_POST['code'];
    $staff_name = @$_POST['name'];
    $staff_pass = @$_POST['pass'];
    $staff_pass2 = @$_POST['pass2'];

    $staff_code = htmlspecialchars($staff_code, ENT_QUOTES, 'UTF-8');
    $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
    $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');
    $staff_pass2 = htmlspecialchars($staff_pass2, ENT_QUOTES, 'UTF-8');

    if($staff_name == '') {
        print('スタッフ名が入力されていません。<br />');
    } else {
        print('スタッフ名'.$staff_name.'<br />');
    }

    if($staff_pass == '') {
        print('パスワードが入力されていません。<br />');
    }

    if ($staff_pass!=$staff_pass2) {
        print('パスワードが一致しません。<br />');
    }

    if ($staff_name == '' || $staff_pass == '' || $staff_pass != $staff_pass2) {
        print('<form><input type="button" onclick="history.back()" value="戻る"></form>');
    } else {
        $staff_pass=md5($staff_pass);
        print('<form method="post" action="staff_edit_done.php">');
        print('<input type="hidden" name="code" value="'.$staff_code.'" >');
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