<?php
	include '../header.php';
?>
    <div class="login">
        <h1>スタッフログイン</h1>
        <br />
        <form method="post" action="staff_login_check.php">
        スタッフコード<br />
        <input type="text" name="code" ><br />
        パスワード<br />
        <input type="password" name="pass"><br />
        <br />
        <input type="submit" value="ログイン">
        </form>
    </div>

<?php
	include '../footer.php';
?>