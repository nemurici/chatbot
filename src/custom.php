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
    return ("Result : \n" . shell_exec($sh));
}

function whois($domain) {
    if((preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain) && preg_match("/^.{1,253}$/", $domain) && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain))) {
        return (shell_exec("whois $domain"));
    } else {
        return ("Mofo, check yo domain and hit the ducking enter");		    }
}

function ping($ip){

	$result = array();

	/* Execute Shell Command To Ping Target */
	if((preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $ip) && preg_match("/^.{1,253}$/", $ip) && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $ip))) {
		
	$cmd_result = shell_exec("ping -c 1 -w 1 $ip");
	} else {
		return("Invalid domain/ip. ");
	}
	/* Get Results From Ping */
	$result = explode(",",$cmd_result);

	/* Return Server Status */
	if(eregi("0 received", $result[1])){
		return ("Target : [color=yellow][b]" . $ip . "[/b][/color] | Status : [color=red][b]OFFLINE[/b][/color]");
	}
	elseif(eregi("1 received", $result[1])){
		return ("Target : [color=yellow][b]" . $ip . "[/b][/color] | Status : [color=lime][b]ONLINE[/b][/color]");
	}
	else{
		return ("Target : [color=yellow][b]" . $ip . "[/b][/color] | Status : [color=yellow][b]UNREACHABLE(Does not exist!)[/b][/color]");
	}
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
