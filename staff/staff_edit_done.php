<?php
	include '../session.php';
	include '../header.php';
	include '../menu.php';
            
    try {
        $post = sanitize($_POST);
        $staff_code = @$post['code'];
        $staff_name = @$post['name'];
        $staff_pass = @$post['pass'];

        include '../database.php';
        $sql = 'UPDATE mst_staff SET name=?, password=? WHERE code=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $staff_name;
        $data[] = $staff_pass;
        $data[] = $staff_code;
        $stmt->execute($data);
        
        $dbh = null;

    } catch(Exception $e) {
        print('ただいま障害により大変ご迷惑をお掛けしております。');
        exit();
    }
?>

修正しました。<br /><br />
<a href="staff_list.php">戻る</a>

<?php
    include '../footer.php';
?>