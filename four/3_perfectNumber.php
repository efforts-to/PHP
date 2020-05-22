<?php
// 编程求1000以内的所有“完数”，所谓“完数”是指一个数恰好等于它的包括1在内的所有因子之和。例如6是完数，因为6=1+2+3.

header("Content-type:text/html;charset=utf-8;");
result(1000);
function result($paremeter){
  for ($i=2; $i <$paremeter; $i++) {
    // code...
      perfectNmuber($i);
  }
}
function perfectNmuber($paremeter)
{
  $result=0;
  // code...
    // code...
    for ($m=1; $m < $paremeter; $m++) {
      // code...
      if ($paremeter%$m==0) {
        // code...
         $result +=$m;
      }

    }
    if ($paremeter==$result) {
      // code...
      echo "$paremeter"."&nbsp";
    }
}

 ?>
