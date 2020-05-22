<?php
//等额本息
//每期还款额=(月利率*(1+月利率)^还款月数)/((1+月利率)^还款月数-1)*借款本金
//每月利息=剩余本金x贷款月利率
//每月还款本金=每月还款额-每月利息
  output(1000000,30,0.05);
  function output($paremeter_1,$paremeter_2,$paremeter_3){
    //$paremeter_1->贷款金额   $paremeter_2->贷款年限  $paremeter_3->年利率
    echo "<table border=1 style=\"text-align:center\">";
    echo "<tr><td colspan=\"4\">等额本息</td></tr>";
    echo "<tr>
    <td>还款批次</td>
    <td>本金</td>
    <td>利息</td>
    <td>合计</td>
    </tr>";
    $car = 0;
    for ($i=1; $i <=month($paremeter_2); $i++) {
      echo "<tr>";
      echo "<td>".$i."</td>";
      if ($i==0) {
        echo "<td>".principal(reimbursement($paremeter_1,$paremeter_2,$paremeter_3),interest($paremeter_1,0,$paremeter_3))."</td>";
        echo "<td>".interest($paremeter_1,0,$paremeter_3)."</td>";
        $car += principal(reimbursement($paremeter_1,$paremeter_2,$paremeter_3),interest($paremeter_1,0,$paremeter_3));
      }else {
        echo "<td>".principal(reimbursement($paremeter_1,$paremeter_2,$paremeter_3),interest($paremeter_1,$car,$paremeter_3))."</td>";
        echo "<td>".interest($paremeter_1,$car,$paremeter_3)."</td>";
        $car += principal(reimbursement($paremeter_1,$paremeter_2,$paremeter_3),interest($paremeter_1,$car,$paremeter_3));
      }
      echo "<td>".reimbursement($paremeter_1,$paremeter_2,$paremeter_3)."</td>";

      echo "</tr>";
    }
    echo "</table>";
  }
  function reimbursement($paremeter_1,$paremeter_2,$paremeter_3){//每月还款额
      //$paremeter_1->贷款金额   $paremeter_2->贷款年限  $paremeter_3->年利率
    return number_format((interestRate($paremeter_3)*pow((1+interestRate($paremeter_3)),month($paremeter_2)))/(pow((1+interestRate($paremeter_3)),month($paremeter_2))-1)*$paremeter_1,2,".","");
  }
  function month($paremeter_1){//月数 $paremeter_1->贷款年限
    return $paremeter_1*12;
  }
  function interestRate($paremeter_1){//每月利率  $paremeter_1->年利率
    return $paremeter_1/12;
  }
  function interest($paremeter_1,$paremeter_2,$paremeter_3){//每月利息
  //$paremeter_1->贷款金额   $paremeter_2->上月还款  $paremeter_3->年利率
    return number_format(($paremeter_1-$paremeter_2)*interestRate($paremeter_3),2,".","");
  }
  function principal($paremeter_1,$paremeter_2){//每月本金  $paremeter_1->剩余本金  $paremeter_2->上月本金
    return number_format($paremeter_1-$paremeter_2,2,".","");
  }
 ?>
