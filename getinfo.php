<?php
include ("curl.php");
function getinfo($avnum) 
{
    $cid = json_decode(curl("api.bilibili.com/x/player/pagelist?aid=" . "$avnum" . "&jsonp=jsonp") , true);
    $i = 0;
    if (empty($cid['data']['1'])) 
    {
        $info['mpart'] = "0";
        $info[$i]['cid'] = $cid['data'][$i]['cid'];
        $info[$i]['name'] = $cid['data'][$i]['part'];
    } else 
    {
        $info['mpart'] = "1";
        foreach ($cid as $key => $value) 
        {
            if (is_array($value)) 
            {
                foreach ($value as $key2 => $value2) 
                {
                    $info[$i]['cid'] = $value[$i]['cid'];
                    $info[$i]['name'] = $value[$i]['part'];
                    $i++;
                }
            }
        }
    }
    return $info;
}