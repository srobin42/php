<?php
/*
 * Turns Roman Numeral string into positional base-10 numbersRoman Numeral.
*/
function toRoman($s) {
    $roman = ["IV","IX","XL","XC","CD","CM"];
    $num = ["4,","9,","40,","90,","400,","900,"];

    $roman2 = ["I","V","X","L","C","D","M"];
    $num2 = ["1,","5,","10","50","100","500,","1000,"];

    //translate numerals into digits
    $s = str_replace($roman, $num, $s);
    $s = str_replace($roman2, $num2, $s);
    //split string into array, sum and return
    $sum = array_sum(explode(",", $s));
    print $sum;
    return $sum;
     
}
