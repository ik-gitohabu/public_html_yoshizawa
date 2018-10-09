<?php
    $test = 'hoge';

    //php print demo
    print('test');
    print($test);
    print_r($test); //配列を出力
    print $test;

    //php debug
    var_dump($test);

    $a = 1;
    $b = 3;

    //文字列連結
    print($test.$a);
    print('<br />');

    //計算
    print($a + $b);
    print('<br />');

?>

<!--html上で変数の値を表示したいとき-->
<?=$test?>