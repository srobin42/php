<?php

class Game {
    static $scores = [];
    static $prevFrames = [];

    public function __construct(){
 
    }

    public function roll($pins) {
        if ($pins == 10) {
            static::$prevFrames[] = 'X';

        } else {

        }
    }

}