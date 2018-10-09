<?php
	include '../session.php';
	include '../header.php';
	include '../menu.php';

    try {
        //$staff_code = $_POST['staffcode'];
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

<h1>スタッフ情報参照</h1>
スタッフコード<br />
<?=$staff_code?><br /><br />
スタッフ名<br />
<?=$staff_name?><br />
<form>
<input type="button" onclick="history.back()" value="戻る">
</form>

<?php
    include '../footer.php';
?>