<?php

function real_ip() {
	$client_ip  = @$_SERVER['HTTP_CLIENT_IP'];
	$forwarded_for = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	$pc_remote_addr = @$_SERVER['HTTP_PC_REMOTE_ADDR'];
	$x_forwarded = @$_SERVER['HTTP_X_FORWARDED'];
	$forwarded_for = @$_SERVER['HTTP_FORWARDED_FOR'];
	$forwarded = @$_SERVER['HTTP_FORWARDED'];
	if (valid_ip($client_ip)) {
		return $client_ip;
	}
	foreach (explode(',', $forwarded_for) as $ip) {
		if (valid_ip(trim($ip))) {
			return $ip;
		}
	}
	if (valid_ip($pc_remote_addr)) {
		return $pc_remote_addr;
	} elseif (valid_ip($x_forwarded)) {
		return $x_forwarded;
	} elseif (valid_ip($forwarded_for)) {
		return $forwarded_for;
	} elseif (valid_ip($forwarded)) {
		return $forwarded;
	} else {
		return $_SERVER["REMOTE_ADDR"];
	}
}

function valid_ip($ip) {
	if (!empty($ip) && ip2long($ip) != -1) {
		$reserved_ips = array(
				array('0.0.0.0', '2.255.255.255'),
				array('10.0.0.0', '10.255.255.255'),
				array('127.0.0.0', '127.255.255.255'),
				array('169.254.0.0', '169.254.255.255'),
				array('172.16.0.0', '172.31.255.255'),
				array('192.0.2.0', '192.0.2.255'),
				array('192.168.0.0', '192.168.255.255'),
				array('255.255.255.0', '255.255.255.255')
		);
		foreach ($reserved_ips as $r) {
			$min = ip2long($r[0]);
			$max = ip2long($r[1]);
			if ((ip2long($ip) >= $min) && (ip2long($ip) <= $max)) return false;
		}
		return true;
	}
	return false;
}