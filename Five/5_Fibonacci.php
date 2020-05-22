<?php
// 写一个函数实现斐波那契数列，该函数可接收一个参数来返回指定的斐波那契数值
header("Content-type:text/html;charset=utf-8;");
echo fibonacci(5);
function fibonacci($paremeter_1){// $paremeter_1 输入想要取得的第几个斐波那契数
  if ($paremeter_1>0) {
    // code...
    return "该数对应的斐波那契数列的值是:".judge($paremeter_1);
  }
  else {
    return "请输入一个大于0的值";
  }
}
function judge($paremeter_1){
    switch ($paremeter_1) {
      case '1':
        return 1;
        break;
      case '2':
        return 1;
        break;
      default:
        return judge($paremeter_1-1)+judge($paremeter_1-2);
        break;
    }
}
 ?>
