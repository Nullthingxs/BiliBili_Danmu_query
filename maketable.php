<?php
$output = fopen(intval($argv[3]), "w");

for ($uid=intval($argv[1]); $uid<=intval($argv[2]); $uid++) {
  
    //echo $uid.",".bin2hex(mhash(MHASH_CRC32B, $uid))."\r\n";
    fwrite($output,$uid.",".bin2hex(mhash(MHASH_CRC32B, $uid))."\r\n");//写入hash和uid
    if($uid%30000 == 0){//取余  若结果为0代表能够整除
      echo $uid.",".bin2hex(mhash(MHASH_CRC32B, $uid))."\r\n";
      }else{}
  }
fclose($output);
