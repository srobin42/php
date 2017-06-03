<?php
//isPangram returns true if input contains every letter a-z at least once
function isPangram($s) {
    for ($i=ord('a'); $i<=ord('z'); $i++){
        if(stripos($s, $i) === false){
            return false;
        }
    }
    return true;
}
