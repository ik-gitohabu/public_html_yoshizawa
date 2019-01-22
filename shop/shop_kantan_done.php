<?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['member_login']) == false) {
        print 'ログインされていません。<br />';
        print '<a href="../shop_list.php">商品一覧へ</a>';
        exit();
    } else {
		print('ようこそ'.$_SESSION['member_name'].'様 <a href="member_logout.php">ログアウト</a><br /><br />');
	}
	
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>よしざわ農園</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

<?php

	try {
		require_once('../common/common.php');
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
		$honbun .= $onamae."様\n\nこのたびはご注文ありがとうございました。\n";
		$honbun .= "\n";
		$honbun .= "ご注文商品\n";
		$honbun .= "--------------------\n";

		$cart = $_SESSION['cart'];
		$kazu = $_SESSION['kazu'];
		$kakaku = array();
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
			$kakaku[$key] = $price;
			$suryo = $kazu[$key];
			$shokei = $price * $suryo;

			$honbun .= $name." ";
			$honbun .= $price."円 x";
			$honbun .= $suryo."個 = ";
			$honbun .= $shokei."円\n";
		}

		$sql = 'LOCK TABLES dat_sales WRITE, dat_sales_product WRITE';
		$stmt = $dbh->prepare($sql);
		$stmt->execute();

		$lastmembercode = $_SESSION['member_code'];

		$sql = 'INSERT INTO dat_sales (
								code_member,
								name,
								email,
								postal1,
								postal2,
								address,
								tel
							) VALUE (
								?,?,?,?,?,?,?
							)';
		$stmt = $dbh->prepare($sql);
		$data = array();
		$data[] = $lastmembercode;
		$data[] = $onamae;
		$data[] = $email;
		$data[] = $postal1;
		$data[] = $postal2;
		$data[] = $address;
		$data[] = $tel;
		$stmt->execute($data);

		$sql = 'SELECT LAST_INSERT_ID()';
		$stmt = $dbh->prepare($sql);
		$stmt->execute();
		$rec = $stmt->fetch(PDO::FETCH_ASSOC);
		$lastcode = $rec['LAST_INSERT_ID()'];

		foreach($cart as $key => $val) {
			$sql = 'INSERT INTO dat_sales_product (
									code_sales,
									code_product,
									price,
									quantity
								) VALUES(
									?,?,?,?
								)';
			$stmt = $dbh->prepare($sql);
			$data = array();
			$data[] = $lastcode;
			$data[] = $cart[$key];
			$data[] = $kakaku[$key];
			$data[] = $kazu[$key];
			$stmt->execute($data);
		}

		$sql = 'UNLOCK TABLES';
		$stmt = $dbh->prepare($sql);
		$stmt->execute();

		$dbh = null;

		$honbun .= "送料は無料です。\n";
		$honbun .= "--------------------\n";
		$honbun .= "\n";
		$honbun .= "代金は以下の口座にお振込ください。\n";
		$honbun .= "よしざわ銀行 やさい支店 普通口座 1234567\n";
		$honbun .= "入金確認が取れ次第、梱包、発送させていただきます。\n";
		$honbun .= "\n";
		$honbun .= "□□□□□□□□□□□□□□□□□□□□\n";
		$honbun .= " 〜安心野菜のよしざわ農園〜\n";
		$honbun .= "\n";
		$honbun .= "○○県六丸郡六丸村 123-4\n";
		$honbun .= "電話 090-6060-xxxx\n";
		$honbun .= "メール info@yoshizawanouen.co.jp\n";
		$honbun .= "□□□□□□□□□□□□□□□□□□□□\n";

		print '<br /><br />';
		print nl2br($honbun);

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
		mb_send_mail('info@yoshizawanouen.co.jp', $title, $honbun, $header);

		$_SESSION['cart'] = array();
		$_SESSION['kazu'] = array();
	} catch(Exception $e) {
		print('ただいま障害により大変ご迷惑をお掛けしております。');
		exit();
	}
?>

<br />
<a href="shop_list.php">商品画面へ</a>

</body>
</html>