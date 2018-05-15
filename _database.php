<?php
    $dsn = 'mysql:dbname=;host=localhost;charset=utf8';
    $user = '';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);