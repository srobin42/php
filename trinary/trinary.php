<?php

function toDecimal($i) {
    $sum = 0;
    //if (preg_match('/[3-9]+/', $i) != 1) { 
    //- I submitted above, below is better
    if (!preg_match('/[^0-2]+/', $i)) { 
        $trinary = array_reverse(str_split($i));
        foreach ($trinary as $key => $value) {
            $sum += $value * pow(3,$key);
        }
    }
    return $sum;
}