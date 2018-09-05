<?php
	include '../session_guest.php';
	include '../header.php';
	include '../menu_guest.php';
	if(isset($_SESSION['member_login']) == false) {
        print 'ログインされていません。<br />';
        print '<a href="../shop_list.php">商品一覧へ</a>';
        exit();
    }

	$code = $_SESSION['member_code'];

	include '../database.php';
	$sql = 'SELECT name, email, postal1, postal2, address, tel FROM dat_member WHERE code = ?';
	$stmt = $dbh->prepare($sql);
	$data[0] = $code;
	$stmt->execute($data);

	$rec = $stmt->fetch(PDO::FETCH_ASSOC);

	$onamae = $rec['name'];
	$email = $rec['email'];
	$postal1 = $rec['postal1'];
	$postal2 = $rec['postal2'];
	$address = $rec['address'];
	$tel = $rec['tel'];

	print 'お名前 '.$onamae.'<br /><br />';
	print 'メールアドレス '.$email.'<br /><br />';
	print '郵便番号 '.$postal1.'-'.$postal2.'<br /><br />';
	print '住所 '.$address.'<br /><br />';
	print '電話番号 '.$tel.'<br /><br />';

?>

<form method="post" action="shop_kantan_done.php">
<input type="hidden" name="onamae" value="<?=$onamae?>">
<input type="hidden" name="email" value="<?=$email?>">
<input type="hidden" name="postal1" value="<?=$postal1?>">
<input type="hidden" name="postal2" value="<?=$postal2?>">
<input type="hidden" name="address" value="<?=$address?>">
<input type="hidden" name="tel" value="<?=$tel?>">
<input type="button" onclick="history.back()" value="戻る">
<input type="submit" value="OK"><br />
</form>

<?php
	include '../footer.php';
?>