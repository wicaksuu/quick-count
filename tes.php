<?php

function capitalizeAfterSpace($string) {

    $string = strtolower($string);
    $data = explode(" ", $string);
    $out=[];
    foreach ($data as $value) {
        $firstLetter = substr($value, 0, 1);
        $result = substr($value, 1);
        $replace = strtoupper($firstLetter);
        $out[] = $replace.$result;
    }
    return implode(" ", $out);
}

// Contoh penggunaan
$inputString = 'KABUPATEN MADIUN';
$outputString = capitalizeAfterSpace($inputString);

print_r($outputString);
