<?php

function parse_binary($binary)
{
    $num = 0;
    if (preg_match('/[^01]/',$binary)) {
        throw new InvalidArgumentException("Not a valid binary value");
    }
    $binary = array_reverse(str_split($binary));
    foreach ($binary as $key => $value) {
        $num += $value * pow(2, $key);
    }
    return $num;
}
