<?php
	include '../session.php';
	include '../header.php';
	include '../menu.php';
?>

<form method="post" action=gakunen_done.php>
あなたは何年生?<br />
<input type="text" name="gakunen"><br />
<input type="submit" value="OK">
</form>

<?php
	include '../footer.php';
?>