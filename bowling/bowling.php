<?php
/*
 * Class Game tallies a bowling game score.
 */
class Game {
    private $numRolls = 0;
    private $score = [];
    private $prevRoll = 0;
    private $fillFrames = 0;
   
    public function roll($pins) {
        if ($pins < 0 || $pins > 10) {
            throw new Exception("Invalid number of pins.");        
        }
        $this->numRolls++;

        if ($this->fillFrames > 0) {
            //bonus fill frames
            if ($pins+$this->prevRoll > 10) {
                throw new Exception("Invalid number of pins thrown.");        
            }            
            //spare in two roll bonus does not get a bonus roll
            $this->score[] = $pins;
            $this->prevRoll = ($pins == 10) ? 0 : $pins;
            $this->fillFrames--;           
        } else {
            if ($pins == 10) { 
                //strike
                $this->numRolls++;
            } elseif ($this->numRolls%2==0) {
                //see if spare picked up
                if ($pins+$this->prevRoll > 10) {
                    throw new Exception("Invalid number of pins thrown.");        
                }          
            } else {
                $this->prevRoll = $pins; 
            }

            $this->score[] = $pins;
            
            //handle last frame where fill balls are possible         
            if ($this->numRolls == 20 && $pins == 10) {
                $this->fillFrames = 2;
                $this->numRolls = 18; //set back complete game to # of fill rolls
                $this->prevRoll = 0;
            } elseif ($this->numRolls == 20 && $pins + $this->prevRoll == 10) {
                $this->fillFrames = 1;
                $this->numRolls = 19; //set back complete game to # of fill rolls
                $this->prevRoll = 0;
            } 
         }
    }

    public function score() {
        if ($this->numRolls == 20) {
            return $this->tally();
        } else {
            throw new Exception("Incomplete or invalid games cannot be scored.");
        }       
    }

    private function tally() {
        $total = 0;
        $rollCount = 1;
        for ($i=0; $i<count($this->score); $i++) {
            if ($this->score[$i] == 10 && $rollCount < 19) {
                //strike earns next two rolls as bonus, counts as both rolls in frame
                $total += $this->score[$i+1] + $this->score[$i+2];
                $rollCount++;
            } else {
                //check for spares
                if ($rollCount % 2 == 0 && $rollCount < 20) {
                    if ($this->score[$i] + $this->score[$i-1] == 10) {
                        $total += $this->score[$i+1];
                    }
                }
            }
            $total += $this->score[$i];
            $rollCount++;
        }

        return $total;
    }

}