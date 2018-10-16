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
    
    $post = sanitize($_POST);
    $staff_code = @$post['code'];
    $staff_name = @$post['name'];
    $staff_pass = @$post['pass'];
    $staff_pass2 = @$post['pass2'];

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