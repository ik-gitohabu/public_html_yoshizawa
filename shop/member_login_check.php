<?php	
	try {
		require_once('../common/common.php');
		
		$post = sanitize($_POST);
		$member_email = @$post['email'];
		$member_pass = @$post['pass'];

		//staff_add_checkで暗号化した方法に合わせる
		$member_pass = md5($member_pass);

		include '../database.php';

		$sql = 'SELECT code, name FROM dat_member WHERE email = ? AND password = ?';
		$stmt = $dbh->prepare($sql);
		$data[] = $member_email;
		$data[] = $member_pass;
		$stmt->execute($data);

		$dbh = null;

		$rec = $stmt->fetch(PDO::FETCH_ASSOC);

		if($rec == false) {
			print 'メールアドレスかパスワードが間違っています。<br />';
			print '<a href="member_login.php"> 戻る</a>';
		} else {
			session_start();
			$_SESSION['member_login'] = 1;
			$_SESSION['member_code'] = $rec['code'];
			$_SESSION['member_name'] = $rec['name'];
			header('Location:shop_list.php');
			exit();
		}
	} catch(Exception $e) {
		print 'ただいま障害により大変ご迷惑をお掛けしております。';
		exit();
	}
?>