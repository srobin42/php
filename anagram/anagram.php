<?php
function detectAnagrams($word, $list){
    $anagrams = [];
    //need original word and lowercase version for comparison
    $lowerWord = mb_strtolower($word);
    $wordCount = array_count_values(preg_split('//u', $lowerWord, null, PREG_SPLIT_NO_EMPTY));
    foreach ($list as $value) {
        //need lowercase version for comparison, original version to return in array
        $lowerValue = mb_strtolower($value);
        if ($word != $value && $lowerWord != $lowerValue) {
            $valCount = array_count_values(preg_split('//u', $lowerValue, null, PREG_SPLIT_NO_EMPTY));
            if ($valCount == $wordCount) {
                $anagrams[] = $value;
            }
        }
    }
    return $anagrams;
}