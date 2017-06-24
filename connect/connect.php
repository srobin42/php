<?php

function offMap($cood, $count) {
    if($cood < 0 || $cood > $count) {
        return true;
    }   
}

function isWinning($side, $xCount, $yCount, $x, $y) {
    if ($side == "X" && $y == $yCount) {
        return true;
    } elseif($side == "O" && $x == $xCount) {
        return true;
    }
    return false;
}

function getNeighbors($x, $y) {
    $neighbors = [];
    $neighbors[] = [$x-1, $y];
    $neighbors[] = [$x-1, $y+1];
    $neighbors[] = [$x, $y-1];
    $neighbors[] = [$x, $y+1];
    $neighbors[] = [$x+1, $y];
    $neighbors[] = [$x+1, $y-1]; 
    return $neighbors; 
}

function calcWinner($x, $y, $side, $moves, $visited) {
    $xCount = count($moves)-1;
    $yCount = count($moves[0])-1;
    if(offMap($x, $xCount)) {
        return false;
    } elseif(offMap($y, $yCount)) {
        return false;
    } 
    if($visited[$x][$y]) {
        return false;
    }
    $visited[$x][$y] = true;
    if($moves[$x][$y] == $side) {
        if (isWinning($side, $xCount, $yCount, $x, $y)) {
            return true;
        } else {
            //get neighbors and calcWinner
            $n = getNeighbors($x, $y);
            foreach ($n as $value) {
                $var = calcWinner($value[0], $value[1], $side, $moves, $visited);
                if ($var) {
                    return true;
                }
            }
            return false;
        }
    }

}

function resultFor($board) {
    $moves = [];
    $visited = [];
    $winner = null;

    foreach ($board as $row => $value) {
        $tmp = str_split($value);
        foreach ($tmp as $col => $stone) {
            $moves[$row][$col] = $stone;
            $visited[$row][$col] = false;            
        }    
    }
    $y = 0;
    for ($x=0; $x<count($moves); $x++) {    
        if (calcWinner($x, $y, "X", $moves, $visited)){
            $winner = "black";
        }
    }
    
    $x = 0;
    for ($y=0; $y<count($moves[0]); $y++) {            
        if (calcWinner($x, $y, "O", $moves, $visited)) {
            $winner = "white";
        }
    }  

    return $winner;   
}
