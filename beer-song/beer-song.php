<?php

class BeerSong
{
    public function verse($v) {
        switch($v){
            case 0:
                $lyric = "No more bottles of beer on the wall, no more bottles of beer.\nGo to the store and buy some more, 99 bottles of beer on the wall.";
                break;
            case 1:
                $lyric = "1 bottle of beer on the wall, 1 bottle of beer.\nTake it down and pass it around, no more bottles of beer on the wall.\n";
                break;
            default:
                $next = $v-1;
                $lyric = "$v bottles of beer on the wall, $v bottles of beer.\nTake one down and pass it around, ";
                if ($next == 1) {
                    $lyric .= "1 bottle of beer on the wall.\n";
                } else {
                    $lyric .= "$next bottles of beer on the wall.\n";
                }
        }
        return $lyric;
    }

    public function verses($start, $end) {
        $song = "";
        for ($i=$start; $i>=$end; $i--) {
            $song .= $this->verse($i);
            if($i != $end) {
                $song .= "\n";
            }
        }
        return $song;
    }

    public function lyrics() {
        return $this->verses(99,0);
    }
}