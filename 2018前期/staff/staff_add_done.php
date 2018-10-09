<?php
	include '../session.php';
	include '../header.php';
	include '../menu.php';

    try {   
        $post = sanitize($_POST);
        $staff_name = @$post['name'];
        $staff_pass = @$post['pass'];

        //空データが入ってしまうため追加推薦
        if (empty($staff_name) or empty($staff_pass)) {
            exit();
        }

        include '../database.php';
        $sql = 'INSERT INTO mst_staff (name, password) VALUES (?, ?)';
        $stmt = $dbh->prepare($sql);
        $data[] = $staff_name;
        $data[] = $staff_pass;
        $stmt->execute($data);

        $dbh = null;
        
        print($staff_name.'さんを追加しました。<br />');

    } catch(Exception $e) {
        print('ただいま障害により大変ご迷惑をお掛けしております。');
        exit();
    }
?>

<a href="staff_list.php">戻る</a>

<?php
    include '../footer.php';
?>