<?php
// 打印倒三角
for ($i=0; $i < 10; $i++) {
  // code...
  for ($n=10; $n>10-$i ; $n--) {
    // code...
    echo "&nbsp&nbsp";
  }
  echo "S";
  for ($m=0; $m < 9-$i; $m++) {
    // code...
    echo "TS";
  }
  echo "<br>";
}
 ?>
