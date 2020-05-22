<?php
// 每月还款金额=（本金/还款月数）+（本金-累计已还本金）×月利率
//每月利息=(本金-累计已还本金)×月利率
//每月本金=总本金/还款月数
// 等额本金
output(1000000,30,0.05);
  function output($paremeter_1,$paremeter_2,$paremeter_3){
    //$paremeter_1->贷款金额   $paremeter_2->贷款年限  $paremeter_3->年利率
    echo "<table border=1 style=\"text-align:center\">";
    echo "<tr><td colspan=\"4\">等额本金</td></tr>";
    echo "<tr>
    <td>还款批次</td>
    <td>本金</td>
    <td>利息</td>
    <td>合计</td>
    </tr>";
    $car = 0;
    for ($i=1; $i < month($paremeter_2); $i++) {
      echo "<tr>";
      echo "<td>".$i."</td>";
      echo "<td>".principal($paremeter_1,month($paremeter_2))."</td>";
      if ($i==0) {
        echo "<td>".interest($paremeter_1,$car,$paremeter_3)."</td>";
        echo "<td>".reimbursement($paremeter_1,$paremeter_2,$paremeter_3,$car)."</td>";
        $car += principal($paremeter_1,month($paremeter_2));
      }else {
        echo "<td>".interest($paremeter_1,$car,$paremeter_3)."</td>";
        echo "<td>".reimbursement($paremeter_1,$paremeter_2,$paremeter_3,$car)."</td>";
        $car += principal($paremeter_1,month($paremeter_2));
      }
      echo "</tr>";
    }
    echo "</table>";
  }
  function interestRate($paremeter_1){//每月利率  $paremeter_1->年利率
    return $paremeter_1/12;
  }
  function principal($paremeter_1,$paremeter_2){//每月本金  $paremeter_1->贷款金额  $paremeter_2->还款月数
    return number_format($paremeter_1/$paremeter_2,2,".","");
  }
  function month($paremeter_1){//月数 $paremeter_1->贷款年限
    return $paremeter_1*12;
  }
  function interest($paremeter_1,$paremeter_2,$paremeter_3){//每月利息
  //$paremeter_1->贷款金额   $paremeter_2->上月还款  $paremeter_3->月利率
    return number_format(($paremeter_1-$paremeter_2)*interestRate($paremeter_3),2,".","");
  }
  // 每月还款金额=（本金/还款月数）+（本金-累计已还本金）×月利率
  function reimbursement($paremeter_1,$paremeter_2,$paremeter_3,$paremeter_4){//每月还款额
      //$paremeter_1->本金   $paremeter_2->贷款年限  $paremeter_3->年利率  $paremeter_4->累计已还本金
    return number_format(($paremeter_1/month($paremeter_2))+($paremeter_1-$paremeter_4)*interestRate($paremeter_3),2,".","");
  }

 ?>
