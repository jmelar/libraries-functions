<?php 

function validate_swift($swift)
{
	$swift = strtolower(str_replace(' ', '',$swift));
	if (preg_match('/^([a-z]){4}([a-z]){2}([0-9a-z]){2}([0-9a-z]{3})?$/', $swift)) {
		return true;
	} else {
		return false;
	}
}
