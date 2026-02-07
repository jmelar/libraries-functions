<?php

function cut_text($string, $setlength, $end = null) {
    $length = $setlength;
    if ($length < strlen($string)) {
        while (($string[$length] != ' ') && ($length > 0)) {
            $length --;
        }
        if ($length == 0) {
            return substr($string, 0, $setlength) . $end;
        } else {
            return substr($string, 0, $length) . $end;
        }
    } else {
        return $string;
    }
}