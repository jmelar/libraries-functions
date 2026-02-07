<?php
function in_array_r($needle, $haystack, $key) {
    foreach ($haystack as $val) {
        if (is_array($val)) {
            if (in_array_r($needle, $val, $key)) {
                return true;
            }
        } else {
            if ($haystack[$key] == $needle) {
                return true;
            }
        }
    }
    return false;
}