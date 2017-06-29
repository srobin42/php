<?php

function accumulate(array $input, callable $accumulator)
{
    $answer = [];
    foreach ($input as $value) {
        $answer[] = $accumulator($value);
    }
    return $answer;
}
