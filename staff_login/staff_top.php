<?php
	include '../session.php';
	include '../header.php';
	include '../menu.php';
?>

	<h1>ショップ管理トップメニュー</h1>
	<br />
	<a href="../staff/staff_list.php">スタッフ管理</a><br />
	<br />
	<a href="../product/pro_list.php">商品管理</a><br />
	<br />
	<a href="../asobi/shun.php">月ごとの旬の野菜</a><br />
	<br />
	<a href="../asobi/hoshi.php">有名な天体</a><br />
	<br />
	<a href="../asobi/gakunen.php">学年ごとに校舎案内</a><br />
	<br />
	<a href="../asobi/gengo.php">西暦から元号判定</a><br />
	<br />
	<a href="staff_logout.php">ログアウト</a><br />

<?php
	include '../footer.php';
?>