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

    $pro_name = @$_POST['name'];
    $pro_price = @$_POST['price'];
    
    $pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
    $pro_price = htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');

    if($pro_name == '') {
        print('商品名が入力されていません。<br />');
    } else {
        print('商品名：'.$pro_name.'<br />');
    }

    if(preg_match('/^[0-9]+$/', $pro_price) == 0) {
        print('価格をきちんと入力してください。<br />');
    } else {
        print('価格：'.$pro_price.'<br />');
    }

    if ($pro_name == '' || preg_match('/^[0-9]+$/', $pro_price) == 0) {
        print('<form><input type="button" onclick="history.back()" value="戻る"></form>');
    } else {
        print('<form method="post" action="pro_add_done.php">');
        print('<input type="hidden" name="name" value="'.$pro_name.'" >');
        print('<input type="hidden" name="price" value="'.$pro_price.'" >');
        print('<br />');
        print('<input type="button" onclick="history.back()" value="戻る">');
        print('<input type="submit" value="OK">');
        print('<form>');
    }

?>

</body>
</html>