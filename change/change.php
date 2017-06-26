<?php

function getCoins($coins, $total) {
    $answer = [];
    $arr = array_reverse($coins);
    foreach ($arr as $value) {
        while($total >= $value) {
            $answer[] = $value;
            $total -= $value;
        }
        if($total == 0){
            return array_reverse($answer);
        }
    }
    return array();
}

function findFewestCoins($coins, $change) {
    $answer = [];
    if ($change == 0) {
        return $answer;
    } elseif($change < 0 || $change < $coins[0]) {
        throw new InvalidArgumentException("Cannot make change");
    }
    
    if(in_array($change, $coins)) {
        $answer[] = $change;
    } else {
        $solution = [];
        $prevSol = [];
        //find fewest coins
        $seek = array_reverse($coins);
        foreach ($seek as $value) {
            $solution = getCoins($coins, $change);
            if(empty($prevSol)) {
                $prevSol = $solution;
            } elseif (count($solution)> 0 && count($prevSol) > count($solution)) {
                $prevSol = $solution;
            }
            array_pop($coins);
        }
        $answer = $prevSol;         
    }
    return $answer;
}