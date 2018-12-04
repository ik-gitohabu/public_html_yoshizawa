<?php
    session_start();
	session_regenerate_id(true);
	
	$error = "";
	require_once('../common/common.php');
	$post = sanitize($_POST);
	$max = $post['max'];
	
	for($i = 0; $i < $max; $i++) {
		$_error = "";
		if (preg_match('/^[0-9]+$/', $post['kazu'.$i]) == 0) {
			$_error = "数量に誤りがあります";
		} elseif ($post['kazu'.$i] < 1 || 10 < $post['kazu'.$i]) {
			$_error = "数量は必ず1個以上、10個までです";
		}
		if (empty($_error)) {
			$kazu[] = $post['kazu'.$i];
		} else {
			$kazu[] = $_SESSION['kazu'][$i];
			$error .= $_error.'/n';
		}
	}

	$cart = $_SESSION['cart'];

	for($i = $max; 0 <= $i; $i--) {
		if(isset($post['sakujo'.$i]) == true) {
			array_splice($cart, $i, 1);
			array_splice($kazu, $i, 1);
			/*$array_splice_test = array_splice($cart, $i, 1);
			$array_splice_test2 = array_splice($kazu, $i, 1);
			var_dump($array_splice_test);
			var_dump($array_splice_test2);*/
		}
	}

	$_SESSION['cart'] = $cart;
	$_SESSION['kazu'] = $kazu;

	header('Location:shop_cartlook.php?error='.$error);
	exit();