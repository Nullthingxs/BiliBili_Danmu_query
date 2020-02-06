<?php
include ("getinfo.php");
function getdanmu($cid) 
{
    $danmu = (curl("comment.bilibili.com/" . "$cid" . ".xml"));
    $xml = xml_parser_create();
    xml_parse_into_struct($xml, $danmu, $xmlarray);
    $xmlarray = json_decode(str_replace('"tag":"D","type":"complete","level":2,', "", json_encode(array_merge(array_diff_key($xmlarray, [0 => "", 1 => "", 2 => "", 3 => "", 4 => "", 5 => "", 6 => "", 7 => ""])))) , true);
    $i = 0;
    $danmutext="";
    foreach ($xmlarray as $key => $value) {
        foreach ($value as $key2 => $value2) 
        {
            if (is_array($value2)) //如果是数组，则进行下一次循环以得到弹幕属性
            {
                foreach ($value2 as $key3 => $value3) 
                {
                    $danmuattribute = explode(",", $value3); //将弹幕属性分割为数组
                    
                }
            } else 
            {
                $danmutext = $value2;
            }
            $danmuarray[$i] = array(//将弹幕属性和弹幕文本合并为一个元素
                $danmuattribute,
                $danmutext
            );
        }
        $i++;
    }
    array_pop($danmuarray);//删除最后一个无用元素
    return $danmuarray;
}
