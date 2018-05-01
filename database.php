<?php
    $dsn = 'mysql:dbname=yoshizawa;host=localhost;charset=utf8';
    $user = 'yoshizawa';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);