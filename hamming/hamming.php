<?php
function distance($a, $b){
    if (strlen($a) != strlen($b)) {
        throw new InvalidArgumentException("DNA strands must be of equal length.");
    } else {
        $d = 0;
        $a = str_split($a);
        $b = str_split($b);
        for ($i=0; $i < count($a); $i++) {
            if ($a[$i] != $b[$i]) {
                $d++;
            }
        }
        return $d;
    }
}
