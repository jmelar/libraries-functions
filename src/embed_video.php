<?php

/**
 * 
 * Get id and video service from string, supports youtube and vimeo 
 * 
 * @param string $embed embed code or url
 * @return array
 */
function embed_video($embed) {
    $aVideo = array();
    if (!filter_var($embed, FILTER_VALIDATE_URL)) {
        
    }
    return $aVideo;
}
