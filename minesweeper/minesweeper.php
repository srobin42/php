<?php
function boardFormed($board) {
    foreach ($board as $row => $value) {
        if ($row > 0 && $row < count($board)-1) {
            $end = strlen($board[1])-1;
            //check for 2+ square board
            if($end < 3 || strlen($value)-1 < $end) {
                return false;
            }
            switch($value[0]){
                case "+":
                    //top or bottom of playing area
                    for($i=1; $i<$end; $i++){
                        if($value[$i] != "-") {
                             return false;
                       }
                    }
                    if($value[$end] != "+") {
                        return false;
                    }
                    break;
                case "|":
                    //middle row of playing area
                    for($i=1; $i<$end; $i++){
                        if(trim($value[$i]) != "" && $value[$i] != "*") {
                            return false;
                       }
                    }
                    if($value[$end] != "|") {
                        return false;
                    }
                    break;
                default:
                    return false;
            }
        }
    }
    return true;
}

function incrementNeighbors($xRow, $yCol, $map){
    foreach ($map as $row => $value) {
        if($row > $xRow +1) {
            break;
        } elseif($row == $xRow ||$row == $xRow-1 || $row == $xRow+1) {
            foreach ($value as $col => $n) {
                if($col == $yCol-1 || $col == $yCol+1) {
                    if(is_numeric($n)) {
                        $map[$row][$col] = $n+1;
                    }
                } elseif($col == $yCol && $row != $xRow) {
                    if(is_numeric($n)) {
                        $map[$row][$col] = $n+1;
                    }
                } elseif($col > $yCol +1) {
                    break;
                }
            }
        }
    }
    return $map;
}

function mapMines($map) {
    foreach ($map as $row => $squares) {
        foreach ($squares as $col => $value) {
            if($value === "*") {
                $map = incrementNeighbors($row, $col, $map);
            }
        }
    }
    return $map;
}

function formatSolution($map, $cnt) {
    $solution = "\n";
    $edge = "+";
    for($i=0; $i<$cnt; $i++) {
        $edge .= "-";
    }
    $solution .= $edge . "+\n";
    foreach ($map as $row) {
        $solution .= "|";
        foreach ($row as $key => $value) {
            $solution .= ($value == "0" ? " " : $value);
            if($key == $cnt) {
                $solution .= "|\n";
            }
        }
    }
    $solution .= $edge . "+\n";
    return $solution;
}

function solve($board) {
    $map = [];
    $solution = $board;

    $board = explode("\n", $board);
    //check for properly formed board
    if(boardFormed($board)) {
        //1st,last row = ""; 2nd, 2nd last rows are board delineators
        for($i=2; $i< count($board)-2; $i++) {
            //1st, last columns are board delineators
            $play = str_split($board[$i]);
            for($j=1; $j<count($play)-1; $j++) {
                //init map
                $map[$i-2][$j] = ($play[$j] === "*" ? "*" : 0);
            }
        }
        $map = mapMines($map);
        $solution = formatSolution($map, count($map[0]));
    } else {
        throw new InvalidArgumentException("Incomplete or malformed board");
    }

    return $solution;
}