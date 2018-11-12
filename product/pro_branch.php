<?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['login']) == false) {
        print 'ログインされていません。<br />';
        print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
        exit();
    }

	if(isset($_POST['add']) == true) {
		header('Location:pro_add.php');
		exit();
	}

    /*$pro_code = @$_POST['procode'];
    
	$pro_code = htmlspecialchars($pro_code, ENT_QUOTES, 'UTF-8');*/

    require_once('../common/common.php');
    $post = sanitize($_POST);

    $pro_code = @$post['procode'];
    
    if (empty($pro_code)) {
        header('Location: pro_ng.php');
        exit();
    }

    if (isset($_POST['disp'])) {
        header('Location: pro_disp.php?procode='.$pro_code);
        exit();
    }

    if (isset($_POST['edit'])) {
        header('Location: pro_edit.php?procode='.$pro_code);
        exit();
    }

    if (isset($_POST['delete'])) {
        header('Location: pro_delete.php?procode='.$pro_code);
        exit();
    }