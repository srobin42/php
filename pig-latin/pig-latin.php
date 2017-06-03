<?php

function translate($s){
    if (strspn($s, "yt") > 1 || strspn($s, "xr") > 1 || strpos($s, "equ")!== false){
        //no trim, just append
        return $s . "ay";
    } 
    //handle sentence case
    if(strpos($s, " ") !== false) {
        $pig = explode(" ", $s);
        foreach ($pig as &$value) {
             $value = rearrange($value);
        }
        return implode(" ", $pig);
    } else {
        return rearrange($s);         
    }
}

function rearrange($s) {
    if (strpos($s,"qu") !== false) {
        //return qu position for one word
        $pos = strpos($s,"qu") + 2;            
    } else {
        //this works for the majority of cases
        $pos = strcspn($s, "aeiou");
    }
    return substr($s,$pos) . substr($s,0,$pos) . "ay";
}
