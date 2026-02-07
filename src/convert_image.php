<?php

function convert_image($image, $save_location = null, $type = 'png')
{
    $image = imagecreatefromstring($image);
	$image_function = 'image' . $type;
	ob_start();
	if ($image_function == 'imagejpeg') {
		    $image_function($image, null, 90);
	} else {
		imagealphablending($image, true);
		imagesavealpha($image, true);				
		$image_function($image);
	}	
	$image = ob_get_contents();
	ob_end_clean();
	if (!is_null($save_location)) {
		file_put_contents($save_location, $image);
	}
	return $image;
}