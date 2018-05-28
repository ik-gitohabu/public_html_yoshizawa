<?php	
	try {
		require_once('../common/common.php');
		
		$post = sanitize($_POST);
		$staff_code = @$post['code'];
		$staff_pass = @$post['pass'];

		$staff_code = htmlspecialchars($staff_code);
		$staff_pass = htmlspecialchars($staff_pass);

		//staff_add_checkで暗号化した方法に合わせる
		$staff_pass = md5($staff_pass);

		include '../database.php';

		$sql = 'SELECT name FROM mst_staff WHERE code = ? AND password = ?';
		$stmt = $dbh->prepare($sql);
		$data[] = $staff_code;
		$data[] = $staff_pass;
		$stmt->execute($data);

		$dbh = null;

		$rec = $stmt->fetch(PDO::FETCH_ASSOC);

		if($rec == false) {
			include '../header.php';
			print 'スタッフコードかパスワードが間違っています。<br />';
			print '<a href="staff_login.php"> 戻る</a>';
			include '../footer.php';
		} else {
			session_start();
			$_SESSION['login'] = 1;
			$_SESSION['staff_code'] = $staff_code;
			$_SESSION['staff_name'] = $rec['name'];
			header('Location:staff_top.php');
			exit();
		}
	} catch(Exception $e) {
		include '../header.php';
		print 'ただいま障害により大変ご迷惑をお掛けしております。';
		include '../footer.php';
		exit();
	}
?>