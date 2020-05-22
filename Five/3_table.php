<?php
// 自定义函数printTable（$rows,$cols,$content,$width,$border），使其能够按照参数生成表格，
// 其中$rows代表行数，$cols代表列数，$content代表填充的内容，
// $width代表宽度（默认值为400）,$border代表边框线宽度（默认值为1）
function printTable($rows,$cols,$content,$width=400,$border=1)
{
  echo "<table border={$border}>";
  for ($i=0; $i < $rows; $i++) {
    // code...
    echo "<tr>";
    for ($m=0; $m < $cols; $m++) {
      // code...
      echo "<td width={$width}>";
      echo "{$content}";
      echo "</td>";
    }
    echo "</tr>";
  }


  echo "</table>";
}
printTable(5,6,5);

 ?>
