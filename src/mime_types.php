<?php

$GLOBALS['aMimeTypes'] = array(
    // Texto y datos
    'csv'  => array('text/csv', 'text/comma-separated-values', 'application/csv'),
    'txt'  => array('text/plain'),
    'html' => array('text/html'),
    'htm'  => array('text/html'),
    'xml'  => array('text/xml', 'application/xml'),
    'json' => array('application/json'),

    // Imágenes
    'jpg'  => array('image/jpeg', 'image/jpg', 'image/pjpeg'),
    'jpeg' => array('image/jpeg'),
    'png'  => array('image/png'),
    'gif'  => array('image/gif'),
    'svg'  => array('image/svg+xml'),
    'webp' => array('image/webp'),
    'tiff' => array('image/tiff'),

    // Documentos
    'pdf'  => array('application/pdf'),
    'doc'  => array('application/msword', 'application/vnd.msword'),
    'docx' => array('application/vnd.openxmlformats-officedocument.wordprocessingml.document'),
    'xls'  => array('application/vnd.ms-excel'),
    'xlsx' => array('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'),
    'ppt'  => array('application/vnd.ms-powerpoint'),
    'pptx' => array('application/vnd.openxmlformats-officedocument.presentationml.presentation'),
    'odt'  => array('application/vnd.oasis.opendocument.text'),
    'ods'  => array('application/vnd.oasis.opendocument.spreadsheet'),
    'odp'  => array('application/vnd.oasis.opendocument.presentation'),
    'rtf'  => array('application/rtf', 'text/rtf'),

    // Archivos comprimidos
    'zip'  => array('application/zip', 'application/x-zip', 'application/x-zip-compressed'),
    'rar'  => array('application/x-rar-compressed', 'application/vnd.rar'),
    '7z'   => array('application/x-7z-compressed'),
    'gz'   => array('application/gzip'),

    // Audio
    'mp3'  => array('audio/mpeg', 'audio/mp3'),
    'wav'  => array('audio/wav', 'audio/x-wav'),
    'ogg'  => array('audio/ogg'),

    // Video
    'mp4'  => array('video/mp4'),
    'avi'  => array('video/x-msvideo'),
    'mov'  => array('video/quicktime'),
    'wmv'  => array('video/x-ms-wmv'),
    'webm' => array('video/webm'),

    // Otros
    'json' => array('application/json'),
    'csv'  => array('text/csv'),
);
/**
 * @url http://filext.com
 */
function mime_types($type) {
	global $aMimeTypes;
	$type = strtolower($type);
	foreach ($aMimeTypes as $ext => $mimes) {
		foreach ($mimes as $mime) {
			if ($type == $mime) {
				return $ext;
			}
		}
	}
	return null;
}

function mime_ext($ext) {
	global $aMimeTypes;
	return $aMimeTypes[$ext][0];
}