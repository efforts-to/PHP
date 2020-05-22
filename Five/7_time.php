<?php
//输入一个月份，当月天数，当月第一天是周几，生成一个日历
outPut(3,31,5);
function outPut($title,$day,$first_day){//$title->月  $day->日  $first_day->星期
  $mon=array('1'=>'一','二','三','四','五','六','七','八','九','十','十一','十二');

  echo "<table border=1 align=center>";
  echo "<tr><td colspan=7 align=center>".$mon[$title]."月</td><tr>";
  echo "<tr>
  <td>星期日</td>
  <td>星期一</td>
  <td>星期二</td>
  <td>星期三</td>
  <td>星期四</td>
  <td>星期五</td>
  <td>星期六</td>
  </tr>";
      echo "<tr>";
      foreach (outDay($day,$first_day) as $key => $value) {
        echo "<td align=center>".$value."</td>";
        if ($value!="") {
          if ($first_day==6) {
            echo "</tr>";
            $first_day=-1;
          }
          $first_day++;
        }
      }
  echo "</table>";
}
function outDay($paremeter_1,$paremeter_2){//$paremeter_1->天数 $paremeter_2->星期
  $arr = array();
  for ($m=1; $m <= $paremeter_1; $m++) {
    array_push($arr,$m);
  }
  for ($i=0; $i < $paremeter_2; $i++) {
    array_unshift($arr,"");
  }
  for ($i=0; $i < count($arr)%7; $i++) {
    array_push($arr,"");
  }
  return $arr;
}
 ?>
