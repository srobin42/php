<?php

function from($stDt) {
    //add gigasecond to date passed in
    $newDt = clone $stDt;
    return $newDt->add(new DateInterval('PT1000000000S'));
}