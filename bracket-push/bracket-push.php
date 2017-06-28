<?php
function brackets_match($input) {
    $input = preg_replace('/[^\[\]\{\}\(\)]/', "", $input);
    $input = str_split($input);
    $queue = [];
    foreach ($input as $val) {
         switch($val){
            case "[":
                $queue[] = $val;
                break;
            case "{":
                $queue[] = $val;
                break;
            case "(":
                $queue[] = $val;
                break;
            case "]":
                $prev = array_pop($queue);
                if($prev != "[") {
                    return false;
                }
                break;
            case "}":
                $prev = array_pop($queue);
                if($prev != "{") {
                    return false;
                }
                break;
            case ")":
                $prev = array_pop($queue);
                if($prev != "(") {
                    return false;
                }
                break;
            
        }
    }
    return count($queue)> 0 ? false : true;
    
}