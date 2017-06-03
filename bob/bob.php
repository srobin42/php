<?php
class Bob {


    public function respondTo($s) {
        $response = "Whatever.";
        //take out whitespace chars
        $s = trim($s);
        //decide what to respond to Bob
        if (strlen($s) == 0) {
            $response = "Fine. Be that way!";
        } else {
            if ($s == strtoupper($s)) {
                //shouted question
                if (strpos($s,"?") == strlen($s)-1) {
                    $response = "Sure.";                       
                }
                //the string must contain letters, not just numbers/spec chars
                $pattern = "#[A-z]#";
                if (preg_match($pattern, $s)) {
                    $response = "Whoa, chill out!";                       
                }
            } else {
               //non-shouted question
               if (strpos($s,"?") == strlen($s)-1){
                    $response = "Sure.";
               }
           }
        }
        return $response;
    }
}