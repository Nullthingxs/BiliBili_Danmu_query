<?php
$dir = './hashtable/';
if (!is_dir($dir)) {
    mkdir(iconv("UTF-8", "GBK", $dir) , 0777, true);
}
for ($uid = intval($argv[1]); $uid <= intval($argv[2]); $uid++) {
    $table = bin2hex(mhash(MHASH_CRC32B, $uid)) . "," . $uid . "\n";
    $output = fopen("$dir" . str_replace("\n", "", substr($table, 0, 3)) , "a"); //将字典条目按照CRC32b值前3位进行分别存储，存储进"前三位".txt内
    fwrite($output, $table); //写入hash和uid
    fclose($output);
    if ($uid % 30000 == 0) { //取余  若结果为0代表能够整除,用作一个进度条。
        echo bin2hex(mhash(MHASH_CRC32B, $uid)) . "," . $uid . "\n";
    } else {
    }
}

?> 