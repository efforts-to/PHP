<?php
//写出一个可以接受多个参数的函数，并且将他们输出
function num(){
   foreach (func_get_args() as $key => $value) {
     echo "$value<br/>";
   }
}
num(1,2,3,4,5,6);


 ?>
