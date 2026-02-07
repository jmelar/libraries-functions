<?php
function mb_ucfirst($string) {
    $string = mb_strtoupper(mb_substr($string, 0, 1)).mb_substr($string, 1);
    return $string;
}