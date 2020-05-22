<?php
// 将100元兑换成至少有2张10元，5张5元和10张1元的兑法
header("Content-type:text/html;charset=utf-8;");
$count=0;
for ($i=2; $i <=10; $i++) {
  // code...
  for ($n=5; $n <=20; $n++) {
    // code...
    for ($m=10; $m <=100; $m++) {
      // code...
      if ((10*$i+5*$n+$m*1)==100) {
        // code...
        $count++;
      }
    }
  }
}
echo "将100元兑换成至少有2张10元，5张5元和10张1元的兑法共有：{$count}种！";















 ?>
