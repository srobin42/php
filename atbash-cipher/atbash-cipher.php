<?php

function encode($msg) {
    //replace all non-word characters
    $msg = preg_replace('/\W/', "", $msg);
    $msg = strtolower($msg);
    $cipher = strtr($msg, 'abcdefghijklmnopqrstuvwxyz', 'zyxwvutsrqponmlkjihgfedcba');

    if(strlen($cipher)>5){
        $cipher = chunk_split($cipher, 5, " ");
    }

    return rtrim($cipher);
}