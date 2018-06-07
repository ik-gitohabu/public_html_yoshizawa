<?php
	include '../session_guest.php';
	include '../header.php';
	include '../menu_guest.php';

    try {
		$cart = array();
		$kazu = array();
		if (isset($_SESSION['cart']) == true) {
			$cart = $_SESSION['cart'];
			$kazu = $_SESSION['kazu'];
			//var_dump($cart);
			//exit();
		}
		$max = count($cart);

		include '../database.php';
		foreach($cart as $key => $val) {
			$sql = 'SELECT name, price, gazou FROM mst_product WHERE code = ?';
			$stmt = $dbh->prepare($sql);
			$data[0] = $val;
			$stmt->execute($data);

			$rec = $stmt->fetch(PDO::FETCH_ASSOC);
			$pro_name[] = $rec['name'];
			$pro_price[] = $rec['price'];
			if ($rec['gazou'] == '') {
				$pro_gazou[] = '';
			} else {
				$pro_gazou[] = '<img src="../product/gazou/'.$rec['gazou'].'">';
			}
		}
		$dbh = null;

		/*for($i = 0; $i < $max; $i++) {
			print $pro_name[$i];
			print $pro_gazou[$i];
			print $pro_price[$i].'円';
			print '<br />';
		}*/
	} catch(Exception $e) {
		print('ただいま障害により大変ご迷惑をお掛けしております。');
		exit();
	}
?>

<?php
	if ($max == 0){
?>
<form>
カートに商品が入っていません。
<br />
<?php
	} else {
?>

<h1>カートの中身</h1>
<form method="post" action="kazu_change.php">
<?php
		for($i = 0; $i < $max; $i++) {
?>
<h2><?=$pro_name[$i]?></h2>
<?=$pro_gazou[$i]?>
<br />
<?=$pro_price[$i]?>円
×
<input type="text" name="kazu<?=$i?>" value="<?=$kazu[$i]?>">個
=
<?=$pro_price[$i] * $kazu[$i]?>円
<br />
<?php
		}
?>
<input type="hidden" name="max" value="<?=$max?>">
<input type="submit" value="数量変更"><br />

<?php
	}
?>

<input type="button" onclick="history.back()" value="戻る">
</form>

<?php
    include '../footer.php';
?>