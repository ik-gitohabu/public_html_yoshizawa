<?php
	include '../header.php';
?>
    <div class="login">
        <h1>スタッフログイン</h1>
        <br />
        <form method="post" action="member_login_check.php">
        登録メールアドレス<br />
        <input type="text" name="email" ><br />
        パスワード<br />
        <input type="password" name="pass"><br />
        <br />
        <input type="submit" value="ログイン">
        </form>
    </div>

<?php
	include '../footer.php';
?>