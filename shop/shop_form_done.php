<?php
	include '../session_guest.php';
	include '../header.php';
	include '../menu_guest.php';

	try {
		$post = sanitize($_POST);

		$onamae = $post['onamae'];
		$email = $post['email'];
		$postal1 = $post['postal1'];
		$postal2 = $post['postal2'];
		$address = $post['address'];
		$tel = $post['tel'];
?>

<?=$onamae?>様<br />
ご注文ありがとうございました。<br />
<?=$email?>にメールを送りましたのでご確認ください。<br />
商品は以下の住所に発送させていただきます。<br />
<?=$postal1?>-<?=$postal2?><br />
<?=$address?><br />
<?=$tel?><br />

<?php
		$honbun = '';
		$honbun .= $onamae.'様\n\nこのたびはご注文ありがとうございました。\n';
		$honbun .= '\n';
		$honbun .= 'ご注文商品\n';
		$honbun .= '--------------------\n';

		$cart = $_SESSION['cart'];
		$kazu = $_SESSION['kazu'];
		$max = count($cart);

		include '../database.php';
		foreach($cart as $key => $val) {
			$sql = 'SELECT name, price FROM mst_product WHERE code = ?';
			$stmt = $dbh->prepare($sql);
			$data[0] = $val;
			$stmt->execute($data);

			$rec = $stmt->fetch(PDO::FETCH_ASSOC);

			$name = $rec['name'];
			$price = $rec['price'];
			$suryo = $kazu[$key];
			$shokei = $price * $suryo;

			$honbun .= $name.' ';
			$honbun .= $price.'円 x';
			$honbun .= $suryo.'個 = ';
			$honbun .= $shokei.'円\n';
		}
        $dbh = null;

		$honbun .= '送料は無料です。\n';
		$honbun .= '--------------------\n';
		$honbun .= '\n';
		$honbun .= '代金は以下の口座にお振込ください。\n';
		$honbun .= 'よしざわ銀行 やさい支店 普通口座 1234567\n';
		$honbun .= '入金確認が取れ次第、梱包、発送させていただきます。\n';
		$honbun .= '\n';
		$honbun .= '□□□□□□□□□□□□□□□□□□□□\n';
		$honbun .= ' 〜安心野菜のよしざわ農園〜\n';
		$honbun .= '\n';
		$honbun .= '○○県六丸郡六丸村 123-4\n';
		$honbun .= '電話 090-6060-xxxx\n';
		$honbun .= 'メール info@yoshizawanouen.co.jp\n';
		$honbun .= '□□□□□□□□□□□□□□□□□□□□\n';

		//print '<br /><br />';
		//print nl2br($honbun);

		$title = 'ご注文ありがとうございます。';
		$header = 'From:info@yoshizawanouen.co.jp';
		$honbun = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');
		mb_language('Japanese');
		mb_internal_encoding('UTF-8');
		mb_send_mail($email, $title, $honbun, $header);

		$title = 'お客様からご注文がありました。';
		$header = 'From:'.$email;
		$honbun = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');
		mb_language('Japanese');
		mb_internal_encoding('UTF-8');
		//mb_send_mail($email, $title, $honbun, $header);
		mb_send_mail('info@yoshizawanouen.co.jp', $title, $honbun, $header);

	} catch(Exception $e) {
		print('ただいま障害により大変ご迷惑をお掛けしております。');
		exit();
	}

	include '../footer.php';
?>