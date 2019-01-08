<?php
    session_start();
    session_regenerate_id(true);
    if(isset($_SESSION['login']) == false) {
        print 'ログインされていません。<br />';
        print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
        exit();
    } else {
        print($_SESSION['staff_name']."さんログイン中<br /><br />");
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

    require_once('../common/common.php');
	$post = sanitize($_POST);
	$year = @$post['year'];
	$month = @$post['month'];
    $day = @$post['day'];

    include '../database.php';
    $sql = '
            SELECT
                dat_sales.code,
                dat_sales.date,
                dat_sales.code_member,
                dat_sales.name AS dat_sales_name,
                dat_sales.email,
                dat_sales.postal1,
                dat_sales.postal2,
                dat_sales.address,
                dat_sales.tel,
                dat_sales_product.code_product,
                mst_product.name AS mst_product_name,
                dat_sales_product.price,
                dat_sales_product.quantity
            FROM
                dat_sales,
                dat_sales_product,
                mst_product
            WHERE
                dat_sales.code = dat_sales_product.code_sales
                AND dat_sales_product.code_product = mst_product.code
                AND substr(dat_sales.date, 1, 4) = ?
                AND substr(dat_sales.date, 6, 2) = ?
                AND substr(dat_sales.date, 9, 2) = ?
            ';
    $stmt = $dbh->prepare($sql);
    $data[] = $year;
    $data[] = $month;
    $data[] = $day;
    $stmt->execute($data);

    $dbh = null;

    $csv = '注文コード,注文日時,会員番号,お名前,メール,郵便番号,住所,TEL,商品コード,商品名,価格,数量';
    $csv .= "\n";
    while(true) {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$rec) {
            break;
        }

        $csv .= $rec['code'].',';
        $csv .= $rec['date'].',';
        $csv .= $rec['code_member'].',';
        $csv .= $rec['dat_sales_name'].',';
        $csv .= $rec['email'].',';
        $csv .= $rec['postal1'].'-'.$rec['postal2'].',';
        $csv .= $rec['address'].',';
        $csv .= $rec['tel'].',';
        $csv .= $rec['code_product'].',';
        $csv .= $rec['mst_product_name'].',';
        $csv .= $rec['price'].',';
        $csv .= $rec['quantity'];
        $csv .= "\n";
    }

    //print nl2br($csv);

    $file_name_hash = new DateTime();
	$file_name = './csv/'.md5($file_name_hash->getTimestamp().rand()).'.csv';
    $file = fopen($file_name, 'w');
    $csv = mb_convert_encoding($csv, 'SJIS', 'UTF-8');
    fputs($file, $csv);
    fclose($file);
?>

<a href="<?=$file_name?>">注文データのダウンロード</a><br />
<br />
<a href="order_download.php">日付選択へ</a><br />
<br />
<a href="../staff_login/staff_top.php">トップメニューへ</a><br />

</body>
</html>