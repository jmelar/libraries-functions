<?php

/**
 * Crea una nueva cookie codificada
 *
 * @param $name
 * @param $value
 * @param $expire
 * @param $path
 * @param $domain
 * @return boolean
 */
function set_cookie($name, $value, $key = null, $expire = null, $path = null, $domain = null, $encrypt = true) {
	require_once 'encrypt_decrypt.php';
	if ($key == null) {
		$key = 'asf43fKsaf3';
	}
	if ($expire == null) {
		$expire = time() + 60 * 60 * 24 * 15;
	}
	if ($path == null) {
		$path = '/';
	}
    if ($domain == null) {
        if (isset(Zend_Registry::get('config')->tlds)) {
            $tlds = Zend_Registry::get('config')->tlds->toArray();
            $domain = '.'.Zend_Registry::get('config')->domain.'.'.$tlds[Zend_Registry::get('config')->domain];
        } elseif (isset(Zend_Registry::get('config')->tld)) {
        	$domain = '.'.Zend_Registry::get('config')->domain.'.'.Zend_Registry::get('config')->tld;
        } elseif (isset(Zend_Registry::get('config')->domains)) {
            $domains = Zend_Registry::get('config')->domains->toArray();
            $domain = '.'.Zend_Registry::get('config')->domain.'.'.$domains[Zend_Registry::get('config')->domain]['tld'];
        }
    }
    if ($encrypt == true) {
        return setcookie($name, encrypt($value, $key), $expire, $path, $domain);
    } else {
	    return setcookie($name, $value, $expire, $path, $domain);
    }
}

/**
 * Obtiene una cookie existente. Se puede pasar un array de nombres para devolver varios.
 *
 * @param $name
 * @return array()
 */
function get_cookie($name, $key = null, $decrypt = true) {
	require_once 'encrypt_decrypt.php';
	if ($key == null) {
		$key = 'asf43fKsaf3';
	}
	if (is_array($name)) {
		foreach ($name as $cookie){
			if ($decrypt == true) {
				$data[$cookie] = decrypt($_COOKIE[$cookie], $key);
			} else {
				$data[$cookie] = $cookie;
			}
		}
	} else {
	    if ($decrypt == true) {
	        $data = encrypt_decrypt($_COOKIE[$name], $key);
	    } else {
		    $data = @$_COOKIE[$name];
	    }
	}
	return $data;
}