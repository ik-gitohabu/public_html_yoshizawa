<?php
	include '../session.php';
	include '../header.php';
	include '../menu.php';
	
	$seireki = $_POST['seireki'];
	print gengo($seireki);

	include '../footer.php';
?>