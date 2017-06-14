<?php
/*
 * Class Clock returns date independent clock time
 */
 class Clock {
    private $time;

    public function __construct($hour, $minutes = 0) {
        $minutes = ($hour*60) + $minutes;
        while ($minutes < 0) {
            $minutes += 1440;
        }
        $minutes = $minutes % 1440;
        $this->time = $minutes;
    }
    
    public function __toString() {  
        return sprintf("%02d:%02d", $this->time/60, $this->time%60);
    }
    
    public function add($minutes) {
        $this->time += $minutes;
        $this->time = $this->time % 1440;
        return $this;
    }

    public function sub($minutes) {
        $this->time -= $minutes % 1440;
        if ($this->time%60 < 0) {
            $this->time = 1440 + $this->time;
        }
        return $this;
    }
    

 }