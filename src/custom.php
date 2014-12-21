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

function msg($cli) {
    global $user;
    message($cli);
}

?>
