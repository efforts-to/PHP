<?php

// 编程求所有的3位素数，且该数是对称的。所谓“素数”是指在大于1的自然数中，
// 除了1和它本身之外没有其他因数的自然数，所谓“对称”是指一个数，倒过来还是该数。例如375不是对称数，因为倒过来编程了573

for ($i=100; $i <1000 ; $i++) {
  // code...
  $count=0;
  for ($m=2; $m <=($i/2) ; $m++) {
    if ($i%$m==0) {
      // code...
      $count++;
    }
  }
  if ($count==0) {
    // code...
    $result=str_split($i);
    krsort($result);
    if ($i==(int)implode($result)) {
      // code...
      echo "$i"."<br>";
    }
  }
}
 ?>
