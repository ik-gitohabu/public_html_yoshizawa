<?php

    if (isset($_POST['add'])) {
        //print('追加ボタンが押されました');
        header('Location: staff_add.php');
        exit();
    }

    $staff_code = @$_POST['staffcode'];
    $staff_code = htmlspecialchars($staff_code, ENT_QUOTES, 'UTF-8');

    if (empty($staff_code)) {
        header('Location: staff_ng.php');
        exit();
    }

    //print($staff_code.'番のスタッフコードを選びました<br />');

    if (isset($_POST['disp'])) {
        //print('参照ボタンが押されました');
        header('Location: staff_disp.php?staffcode='.$staff_code);
        exit();
    }

    if (isset($_POST['edit'])) {
        //print('修正ボタンが押されました');
        header('Location: staff_edit.php?staffcode='.$staff_code);
        exit();
    }

    if (isset($_POST['delete'])) {
        //print('削除ボタンが押されました');
        header('Location: staff_delete.php?staffcode='.$staff_code);
        exit();
    }
