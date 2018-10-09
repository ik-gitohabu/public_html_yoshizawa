<?php
	include '../session.php';
	include '../header.php';
	include '../menu.php';

    try {
        $staff_code = $_GET['staffcode'];

        include '../database.php';
        $sql = 'SELECT * FROM mst_staff WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $staff_code;
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $staff_name = $rec['name'];

        $dbh = null;

    } catch(Exception $e) {
        print('ただいま障害により大変ご迷惑をお掛けしております。');
        exit();
    }
?>

<h1>スタッフ削除</h1>
スタッフコード<br />
<?=$staff_code?><br /><br />
<form method="post" action="staff_delete_done.php">
<input type="hidden" name="code" value="<?=$staff_code?>">
スタッフ名<br />
<?=$staff_name?><br />
このスタッフを削除してよろしいですか？<br />
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK">
</form>

<?php
    include '../footer.php';
?>