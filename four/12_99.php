<?php
//99乘法

echo "<table border=\"1\">";
for ($i=0; $i < 10; $i++) {
  // code...
  echo "<tr>";
  for ($m=$i; $m <=$i ; $m++) {
    // code...
    if ($i==0) {
      // code...
      echo "<td>*</td>";
    }else {
    echo "<td>{$m}</td>";
    }
  }

  for ($b=1; $b < 10; $b++) {
    if ($b==1&&$i==0) {
      // code...
      for ($v=1; $v < 10; $v++) {
        // code...
        echo "<td>";
        echo "$v";
        echo "</td>";
      }
    }else if ($i!=0) {
      echo "<td>";
      echo table($i,$b);
      echo "</td>";
    }

  }
  echo "</tr>";

}
echo "</table>";

function table($paremeter_1,$paremeter_2){
  if ($paremeter_1<$paremeter_2) {
    // code...
    return "";
  }
  return $paremeter_1*$paremeter_2;
}

 ?>
