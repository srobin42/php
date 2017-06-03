<?php
/*
 *  Takes base-10 positional number string and turns it into Roman Numerals
 */
function toRoman($i) {
    $letVals = [
        "M" => 1000,
        "CM" => 900,
        "D" => 500,
        "CD" => 400,
        "C" => 100,
        "XC" => 90,
        "L" => 50,
        "XL" => 40,
        "X" => 10,
        "IX" => 9,
        "V" => 5,
        "IV" => 4,
        "I" => 1,
    ];
    $romanNum = "";
    foreach ($letVals as $key => $val) {
        while($i >= $val) {
            $i -= $val;
            $romanNum .= $key;
        }
    }
    return $romanNum;
}
