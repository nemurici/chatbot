<?php
include("functions.php");
include("chat.inc.php");
include("custom.php");

$admin[] = "shaggi";

$pubfnc[] = "pwd";

$privfnc[] = "sh";
$privfnc[] = "msg";

$user = "user";
$pass = "pass";

login($user, $pass);

$raw = getraw($user);

if(banned($raw)) {
    die("banned");
}

$users = getusers($raw);
$lastid = getlastid($raw);
while(!banned($raw)) {
    $raw = getraw($user,$lastid);
    $users = getusers($raw);
    $a = getlastid($raw);
    if(!empty($a)) {
        $lastid = $a;
    }
    parse($raw);
    sleep(2);
}
    die("loop ended");
?>
