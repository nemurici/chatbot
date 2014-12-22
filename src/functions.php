<?php
function gb($s,$e,$h) {
    @$h = explode($s,$h);
    @$h = explode($e,$h[1])[0];
    return $h;
}

function parse($raw) {
    $posts = gb("<messages>","</messages>",$raw);
    $posts = explode("</message>",$posts);
    foreach($posts as $post) {
        $txt = parse_child($post);
        message($txt);
    }
    return true;
}

function parse_child($post) {
    global $pubfnc,$privfnc,$users;
    $message = gb("<text><![CDATA[","]]",$post);
    $user = gb("<username><![CDATA[","]]",$post);
    $userid = gb("userID=\"","\"",$post);
    if(empty($message)){return false;}
    echo $user.":  ".$message."\n";
    if($cli[0] != "!"){return false;}
    $cli = str_replace("!","",$cli);
    $cli = explode(" ",$message,2);
    if(in_array($cli[0],$pubfnc)){
      return @call_user_func($cli[0],$cli[1],$user);  
    }

    if(in_array($cli[0],$privfnc) && admin($user)){
      return @call_user_func($cli[0],$cli[1],$user);
    }
}

function admin($user) {
    global $admin;
    return in_array($user, $admin);
}

function message($cli) {
    global $user;
    if(!empty($cli)){
      if(strlen($cli)>100){
        $cli = sprunge(urlencode($cli));
        }
    postraw($user,$cli);
  }
}

?>
