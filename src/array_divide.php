<?php 
function array_divide($array, $p) {
    $arraylen = count($array);
    $partlen = floor($arraylen / $p);
    $partrem = $arraylen % $p;
    $partition = array();
    $mark = 0;
    for ($px = 0; $px < $p; $px++) {
        $incr = ($px < $partrem) ? $partlen + 1 : $partlen;
        $partition[$px] = array_slice($array, $mark, $incr);
        $mark += $incr;
    }
    return $partition;
}