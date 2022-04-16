<?php

function FormatDate($date){
    if(!empty($date)){
        return date('d.m.Y', strtotime($date));
    }
}

function FormatDateTime($date){
    if(!empty($date)){
        return date('d.m.Y H:i:s', strtotime($date));
    }
}

function blogtypes(){

    return[
        "youtube",
        "vimeo",
        "yandex"
    ];
}


function getYoutubeVideoID($url){

    $names = array('www.youtube.com','youtube.com');
    $up = parse_url($url);

    if (isset($up['host']) && in_array($up['host'],$names) &&
        isset($up['query']) && strpos($up['query'],'v=') !== false){

        $lp = explode('v=',$url);

        $rp = explode('&',$lp[1]);

        return (!empty ($rp[0]) ? $rp[0] : false);
    }
    return false;
}