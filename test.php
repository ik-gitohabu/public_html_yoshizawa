<?php

    //array_splice demo
    $shori[]=5;
    $shori[]=4;
    $shori[]=3;
    $shori[]=2;
    $shori[]=1;
    $shori[]=0;
    print('処理前<br />');
    var_dump($shori);
    print('<br /><br />');

    $kiritori = array_splice($shori, 3, 2);
    print('処理後<br />');
    var_dump($shori);
    print('<br />');
    print('処理後きりとり<br />');
    var_dump($kiritori);
    print('<br /><br />');

    //php print demo
    /*print('test');

    $test = 'test';
    $a = 1;
    $b = 3;

    //文字列連結
    print($test.$a);
    print('<br />');
    //計算
    print($a + $b);
    print('<br />');*/

?>

<!--<?=$test?>-->