<?php

    //array_splice demo
    $shori['a']=1;
    $shori['b']=2;
    $shori['c']=3;
    $shori['d']=4;
    $shori['e']=5;
    $shori['f']=6;
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