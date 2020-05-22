<?php
// 猴子吃桃问题，猴子第1天摘下若干桃子，当即吃了一半，还不过瘾，又多吃了1个，
// 第2天早上又将剩下的套子吃掉一半，又多吃了1个，以后每天早上都吃了前1天剩下的一半，再多吃1个。
// 到第10天早上想再吃时，见只剩下1个桃子了，试编程求第1天共摘下多少桃子。

header("Content-type:text/html;charset=utf-8;");
echo "猴子一共摘了".monkey(1,10)."个桃子";
function monkey($paremeter_1,$paremeter_2){//$paremeter_1=>剩余桃数  $paremeter_2=>桃吃了几天
  if ($paremeter_2==1) {
    // code...
    return $paremeter_1;
  }else {
    return monkey(($paremeter_1+1)*2,--$paremeter_2);
  }
}
 ?>
