<?php

function difference($i){
    return squareOfSums($i) - sumOfSquares($i);
}

function squareOfSums($i){
    $arr = range(1, $i);
    return pow(array_sum($arr), 2);
}

function sumOfSquares($i){
    if ($i == 1) {
        return 1;
    } else {
        $sq = pow($i,2);
        return $sq + sumOfSquares($i-1);   
    }
}
