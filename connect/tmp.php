<?php
function breadthSearch($row, $col, $moves) {
    if($col == count($moves)-1) {
        //at the end of the columns, is black the winner?
        if ($moves[$row][$col] == "X") {
            return "black";
        } else {
            return null;
        }
    } else {

    }
}

function depthSearch($col, $row, $moves) {
    if ($row == count($moves)-1) {
        //at the end of the rows, is white the winner?
        if ($moves[$row][$col] == "O") {
            return "white";
        } else {

        }
    } else {

    }
}

function resultFor($board) {
    $winner = null;
    $moves = [];
    $xRow = "";
    foreach ($board as $row => $value) {
        $tmp = str_split($value);
        foreach ($tmp as $col => $stone) {
            $moves[$row][$col] = $stone;
        }    
    }
    for($i=0; $i<count($moves); $i++) {
        if($moves[$i][0] == "X") {
            $xRow = $i;
            break;
        }
    }
    if (is_numeric($xRow)) {
        //search the tree for black win
        $winner = breadthSearch($xRow, 0, $moves);
    }
    $oCol = in_array("O", $moves[0]); 
    if($oCol) {
        //search the tree for white win
        $winner = depthSearch(array_search("O", $moves[0]), 0, $moves);
    }

    return $winner;   
}

