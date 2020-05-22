<?php
// 用百分号打印菱形
$t=0;
$q=7;
for ($i=0; $i <10 ; $i++) {
  for ($o=0; $o < 10-$i; $o++) {
    echo "&nbsp&nbsp&nbsp";
  }
  for ($p=0; $p <$i+$t; $p++) {
    echo "%";
  }
  echo "%<br><br>";
  $t++;
}
for ($l=9; $l >0; $l--) {
  // code...
  for ($W=0; $W < 11-$l; $W++) {
    // code...
    echo "&nbsp&nbsp&nbsp";
  }
  for ($p=0; $p <$l+$q; $p++) {
    echo "%";
  }
  echo "%<br><br>";
  $q--;
}





 ?>
