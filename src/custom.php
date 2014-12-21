<?php

function sprunge($cli) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"http://sprunge.us");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST,1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,"sprunge=".$cli);
    curl_setopt ($ch, CURLOPT_HEADER, 0);
    return curl_exec ($ch);
}

function sh($sh) {
    return shell_exec($sh);
}

function whois($domain) {
    if((preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain) && preg_match("/^.{1,253}$/", $domain) && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain))) {
        return (shell_exec("whois $domain"));
    } else {
        return ("Mofo, check yo domain and hit the ducking enter");		    }
}

function ping($domain) {
    $domain = explode(" ",$domain,2);
    $c = intval($domain[1]);
    $domain = $domain[0];
    if($c < 1){ 
        $c = 1;
    }
    if($c > 10) {
        message("Sory aboat that, but we can only allow 10 ping reqs. the number has to go down..");
        $c=10;
    }
    if((preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain) && preg_match("/^.{1,253}$/", $domain) && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain))){
    return (shell_exec("ping $domain -c $c"));
    } else {
        return ("Mofo, check yo domain and hit the ducking enter");		    }
}

function host($domain) {
    if((preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain) && preg_match("/^.{1,253}$/", $domain) && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain))){
        return (shell_exec("host $domain")); 
    } else {
        return ("Mofo, check yo domain and hit the ducking enter");
    }
}

function msg($cli) {
    global $user;
    message($cli);
}

?>
