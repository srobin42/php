<?php
/*
  this function treats all input strings as multibyte
  strings to support languages such as German.
  Returns true if no characters in input string repeat.
*/
function isIsogram($w){
    $tmp = array();
    //lower case the word, take out hyphens and spaces
    $w = mb_strtolower($w);
    $w = preg_replace("/[\s-]/", "", $w);
    //break string into individual characters
    $c = preg_split('//u', $w, null, PREG_SPLIT_NO_EMPTY);
    //check for more than one instance of a char
    foreach ($c as $val) {
        if (!array_key_exists($val, $tmp)) {
            $tmp[$val] = $val;
        } else {
            return false;
        }
    } 
    return true;
}