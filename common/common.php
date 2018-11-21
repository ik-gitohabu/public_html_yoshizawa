<?php

    function gengo($seireki) {

        $gengo = '不明';

        if (1868 <= $seireki && $seireki <= 1911) {
            $gengo = '明治';
        }

        if (1912 <= $seireki && $seireki <= 1925) {
            $gengo = '大正';
        }

        if (1926 <= $seireki && $seireki <= 1988) {
            $gengo = '昭和';
        }

        if (1989 <= $seireki) {
            $gengo = '平成';
        }

        return($gengo);
    }

    function sanitize($before) {

        $after = array();
        foreach($before as $key => $value) {
            $after[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
        return $after;
    }