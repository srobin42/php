<?php

function toRna($dna) {
    /* replace dna sequence with rna counterpart:
       G->C, C->G, T->A, A->U
    */
    $dna = str_split($dna);
    $rna = "";
    foreach ($dna as $val) {
       switch ($val) {
            case 'G':
                $rna .= 'C';
                break;
            case 'C':
                $rna .= 'G';
                break;
           case 'T':
                $rna .= 'A';
                break;
           case 'A':
                $rna .= 'U';
                break;
           default:
                $rna .= $val;
       }
    }
    return $rna;
    /*
    $transform = ['G'=>'C', 'C'=>'G', 'T'=>'A', 'A'=>'U'];
    return implode(array_map(function($c) use($transform) {
        return $transform[$c];
    }, str_split($dna)));
    */
}