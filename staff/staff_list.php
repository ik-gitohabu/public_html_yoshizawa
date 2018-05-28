<?php
	include '../session.php';
	include '../header.php';
	include '../menu.php';

    try {
        include '../database.php';
        $sql = 'SELECT * FROM mst_staff WHERE 1';
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        
        $dbh = null;
        
        print('スタッフ一覧<br /><br />');
        print('<form method="post" action="staff_branch.php">');
        while (true) {
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);
            //var_dump($rec);
            if ($rec==false) {
                break;
            }
            print('<input type="radio" name="staffcode" value="'.$rec['code'].'">');
            print($rec['name'].'<br />');

        }
        print('<input type="submit" name="disp" value="参照">');
        print('<input type="submit" name="add" value="追加">');
        print('<input type="submit" name="edit" value="修正">');
        print('<input type="submit" name="delete" value="削除">');
        print('</form>');
        print('<br />');
        print('<a href="../staff_login/staff_top.php">トップメニューへ</a><br />');

    } catch(Exception $e) {
        print('ただいま障害により大変ご迷惑をお掛けしております。');
        exit();
    }

    include '../footer.php';
?>