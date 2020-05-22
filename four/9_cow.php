<?php

//若一头母牛，从出生起第四个年头开始每年生一头母牛，如此规律，第n年时有多少头母牛？

header("Content-type:text/html;charset=utf-8");
if (!empty($_GET['n'])) {
  $a=$b=$c=1;
  $result=0;
  $year=$_GET['n'];
  $result=cow($year,$a,$b,$c,$result);

  echo "{$year}年生{$result}头牛";
}else {
  echo "<form action=\"\" method=\"get\">
    请输入年份：
    <input type=\"text\" name=\"n\" value=\"\">
    <input type=\"submit\" value=\"提交\">
  </form>";
}
function cow($paremeter_1,$paremeter_2,$paremeter_3,$paremeter_4,$paremeter_5)
{
  if ($paremeter_1<=3) {
    // code...
    echo "1";
  }else {
    for ($i=4; $i <=$paremeter_1; $i++) {
      // code...
      $paremeter_5=$paremeter_2+$paremeter_4;
      $paremeter_2=$paremeter_3;
      $paremeter_3=$paremeter_4;
      $paremeter_4=$paremeter_5;
    }
    return $paremeter_5;
  }
}
 ?>
