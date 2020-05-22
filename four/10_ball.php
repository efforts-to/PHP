<?php

// 一球从100米高度落下，每次落地后反跳回原高度的一半，
// 在落下，它在第10次落地时，共经过了多少距离？第10次落地后的反弹高度是多少？
header("Content-type:text/html;charset=utf-8;");
$smile=100;
$result=0;
for ($i=0; $i <10 ; $i++) {
  // code...
  $smile=$smile/2;
  $result+=$smile*3;
}
$result-=$smile;
echo "10次弹跳经过路程：$result"."<br/>";
echo "最后一次弹跳：$smile";



 ?>
