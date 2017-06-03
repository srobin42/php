<?php
/* 
 * Sieve uses Sieve of Eratosthenes formula to generate primes up to limit input.
 */
function sieve($i) {
    $primes = array();
    if ($i < 2) {
        //return empty array for values below first prime (2)
        return $primes;
    }
    $master = range(2, $i);
    //$primes = array_values($master);
    while(count($master) > 0) {
        $remaining = array_shift($master);
        $primes[] = $remaining;
        $master = array_filter($master, function($element) use($remaining){
            return $element % $remaining != 0;
        });
    }
    return $primes;
}
