<?php
// 求1!+2!+3!+4!+......+12!

header("Content-type:text/html;charset=utf-8;");
echo "阶乘之和是".sumFactorial(12);

function sumFactorial($paremeter){
  if ($paremeter<=1) {
    return 1;
  }else{
    return factorial($paremeter)+sumFactorial($paremeter-1);
  }

}

function factorial($paremeter){

  if ($paremeter<=1) {
    return 1;
  }else {
    return $paremeter*factorial($paremeter-1);
  }
}
 ?>
