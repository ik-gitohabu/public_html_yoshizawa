<?php

	include '../session_guest.php';
	require_once('../common/common.php');

	$post = sanitize($_POST);

	$max = $post['max'];
	for ($i = 0; $i < $max; $i++) {
		$kazu[] = $post['kazu'.$i];
	}
	$_SESSION['kazu'] = $kazu;
	header('Location:shop_cartlook.php');
	exit();