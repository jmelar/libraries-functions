<?php

function add_querystring($url, $key, $value) {
    $aUrl = parse_url($url);
    $aQuery = array();
    if (!empty($aUrl['query'])) {
        parse_str($aUrl['query'], $aQuery);
    }
    $aQuery = array_merge($aQuery, array($key => $value));
    $aUrl['query'] = http_build_query($aQuery);
    return unparse_url($aUrl);  
	/*$url = preg_replace('/(.*)(\?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
    $url = substr($url, 0, -1);
    if (strpos($url, '?') === false) {
        return ($url . '?' . $key . '=' . $value);
    } else {
        return ($url . '&' . $key . '=' . $value);
    }*/
}

function remove_querystring($url, $key) {
    $aUrl = parse_url($url);
    $aQuery = array();
    if (!empty($aUrl['query'])) {
        parse_str($aUrl['query'], $aQuery);
    }
    unset($aQuery[$key]);
    $aUrl['query'] = http_build_query($aQuery);
    return unparse_url($aUrl); 
	/*$url = preg_replace('/(.*)(\?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
    $url = substr($url, 0, -1);
    return ($url);*/
}

function unparse_url(array $parsed): string {
    $pass      = $parsed['pass'] ?? null;
    $user      = $parsed['user'] ?? null;
    $userinfo  = $pass !== null ? "$user:$pass" : $user;
    $port      = $parsed['port'] ?? 0;
    $scheme    = $parsed['scheme'] ?? "";
    $query     = $parsed['query'] ?? "";
    $fragment  = $parsed['fragment'] ?? "";
    $authority = (
        ($userinfo !== null ? "$userinfo@" : "") .
        ($parsed['host'] ?? "") .
        ($port ? ":$port" : "")
    );
    return (
        (\strlen($scheme) > 0 ? "$scheme:" : "") .
        (\strlen($authority) > 0 ? "//$authority" : "") .
        ($parsed['path'] ?? "") .
        (\strlen($query) > 0 ? "?$query" : "") .
        (\strlen($fragment) > 0 ? "#$fragment" : "")
    );
}