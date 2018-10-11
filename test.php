<?php
    //変数・配列
    $test = 'hoge';
    $test2[] = 'foo';
    $test2[] = 'bar';

    //php print demo
    print('test');
    print($test);
    print_r($test2); //配列を出力
    print $test;

    //php debug
    var_dump($test1);
    var_dump($test2); //配列を出力

    $a = 1;
    $b = 3;

    //文字列連結
    print($test.$a);

    //計算
    print($a + $b);
    print(($a + 5 * 10 - 3) / 2);

?>

<!--html上で変数の値を表示したいとき-->
<?=$test?>