<?php
/*
 * calculate function parses input string and performs math based
 * on the keywords found in the string; i.e.: plus for addition.
 */ 
function calculate($str) {
    //remove question mark and beginning What is
    $str = rtrim(substr($str, 8), "?");
    $str = explode(" ", $str);
    $total = "";
    for ($i = 0; $i < count($str); $i += 2) {
        if (is_numeric($str[$i])) {
            $ans = $str[$i];
            $mathExp = $str[$i+1];
            $i++;
        } else {
            $ans = $total;
            $mathExp = $str[$i];
        }

        switch ($mathExp) {
            case "plus":
                $ans += $str[$i+1];
                break;
            case "minus":
                $ans -= $str[$i+1];
                break;
            case "multiplied":
                //skip next value of "by"
                $ans *= $str[$i+2];
                $i++;
                break;
            case "divided":
                //skip next value of "by"
                $ans = $ans/$str[$i+2];
                $i++;
                break;
            default:
                throw new InvalidArgumentException("Invalid input");
        }        
        $total = $ans;
    }

    return $total;
}