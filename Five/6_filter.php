<?php
// 写一个范围过滤函数range_filter($min,$max,$filter_num)，该函数允许传递一个范围参数
// $min代表最小值,$max代表最大值，在这个范围内，去除包含某个数$filter_num的所有数值，未去除的数保存在一个数组中返回
function range_fileter($min,$max,$filter_num){
  $arr=judge($min,$max);
  foreach ($arr as $key => $value) {
    $more=str_split($value);
    for ($m=0; $m <count($more) ; $m++) {
      if ($more[$m]==$filter_num) {
        unset($arr[$key]);
      }
    }
  }
  echo "<pre>";
  print_r($arr);
}
function judge($paremeter_1,$paremeter_2){
  for ($i=$paremeter_1; $i <=$paremeter_2 ; $i++) {
    $arr[]=$i;
  }
  return $arr;
}
range_fileter(0,100,5);
 ?>
