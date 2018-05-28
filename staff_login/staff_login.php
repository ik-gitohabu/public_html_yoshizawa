<?php
	include '../header.php';
?>

    スタッフログイン<br />
    <br />
    <form method="post" action="staff_login_check.php">
    スタッフコード<br />
    <input type="text" name="code" ><br />
    パスワード<br />
    <input type="password" name="pass"><br />
    <br />
    <input type="submit" value="ログイン">
    </form>

<?php
	include '../footer.php';
?>