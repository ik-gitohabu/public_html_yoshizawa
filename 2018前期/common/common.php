<?php

    function gengo($seireki) {

        $gengo = '太古';

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

    function pulldown_year(){
        $pulldown = '<select name="year">';
        for ($i = 2017;$i <= 2020; $i++){
            $pulldown .= '<option value="'.$i.'">'.$i.'</option>';
        }
        $pulldown .= '</select>';
        print $pulldown;
    }

    function pulldown_month(){
        $pulldown = '<select name="month">';
        for ($i = 1;$i <= 12; $i++){
            $pulldown .= '<option value="'.sprintf('%02d', $i).'">'.sprintf('%02d', $i).'</option>';
        }
        $pulldown .= '</select>';
        print $pulldown;
    }

    function pulldown_day(){
        $pulldown = '<select name="day">';
        for ($i = 1;$i <= 31; $i++){
            $pulldown .= '<option value="'.sprintf('%02d', $i).'">'.sprintf('%02d', $i).'</option>';
        }
        $pulldown .= '</select>';
        print $pulldown;
    }