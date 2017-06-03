<?php
function isLeap($year) {
    switch (true) {
    case $year%4 != 0:
        return false;
    case $year%100 == 0 && $year%400 == 0:
        return true;
    case $year%100 == 0:
        return false;
     default:
        return true;
    }
}