<?php

function wordCount($s){
    $s = strtolower($s);
    $words = preg_split('/[\s,:!&@$%^]+/', $s, null, PREG_SPLIT_NO_EMPTY);
    return array_count_values($words);
}