<?php
	include '../session.php';
	include '../header.php';
	include '../menu.php';

    try {   
        //エラー回避のため三項演算子・エルビス演算子を使用
        $staff_name = @$_POST['name'] ?: '';
        $staff_pass = @$_POST['pass'] ?: '';

        //空データが入ってしまうため追加推薦
        if (empty($staff_name) or empty($staff_pass)) {
            exit();
        }
    
        $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
        $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');

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