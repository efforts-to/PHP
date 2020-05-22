<?php

// 编程求所有的“水仙花数”，所谓“水仙花数”，是指一个三位数，其各位数字立方和等于该数本身。
// 例如153是水仙花数，因为153 = pow(1,3)+pow(5,3)+pow(3,3)
//

header("Content-type: text/html; charset=utf-8");
echo "水仙花数有:";
for ($i=100; $i < 1000; $i++) {
  $arr = str_split($i, 1);
  if ($i==(pow($arr[0],3)+pow($arr[1],3)+pow($arr[2],3))){
    echo $i."&nbsp";
  }
}

 ?>
