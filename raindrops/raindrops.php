<?php
function raindrops($i) :string {
    $ret = "";
    if ($i%3 == 0) {
        $ret = "Pling";
    }
    if ($i%5 == 0) {
        $ret .= "Plang";
    }
    if ($i%7 == 0) {
        $ret .= "Plong";
    }
    return (empty($ret) ? $i : $ret);
}

