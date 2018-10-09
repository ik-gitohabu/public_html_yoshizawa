<?php
	include '../session.php';
	include '../header.php';
	include '../menu.php';
?>

<form method="post" action=gengo_done.php>
西暦を入力してください<br />
<input type="text" name="seireki"><br />
<input type="submit" value="OK">
</form>

<?php
	include '../footer.php';
?>