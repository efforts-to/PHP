<?php
header("Content-type: text/html; charset=utf-8");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="" method="post">
      <h2>员工信息</h2>
      <p>
        姓名:<input type="text" name="name" value="">
      </p>
      <p>所在部门:
        <select class="" name="depart_name">
          <option value="市场部" selected>市场部</option>
          <option value="财务部">财务部</option>
          <option value="研发部">研发部</option>
          <option value="人力资源部">人力资源部</option>
          <option value="后勤部">后勤部</option>
        </select>
      </p>
      <p>
        家庭住址:<input type="text" name="address" value="">
      </p>
      <p>
        联系电话:<input type="text" name="phone" value="">
      </p>
      <p>
        电子邮箱:<input type="text" name="email" value="">
      </p>
      <input type="submit" name="" value="提交">
    </form>
    <a href="./contact_info.php">操作</a>
  </body>
</html>
<?php
  if ($_SERVER['REQUEST_METHOD']!='POST') {
    exit;
  }
  $msg=array();
  if (empty($_POST)) {
    echo "各项不能为空";
    exit;
  }
  foreach ($_POST as $value) {
    if (empty($value)) {
      echo "各项不能为空";
      exit;
    }
  }
header("Content-type:text/html;charset=utf-8");
$name=pMessage($_POST["name"]);
$depart_name=pMessage($_POST["depart_name"]);
$address=pMessage($_POST["address"]);
$phone=pMessage($_POST["phone"]);
$email=pMessage($_POST["email"]);

if(strlen($name)>9){
  array_push($msg,"姓名不能超过三个字符");
}
if (strlen($address)>48) {
  array_push($msg,"地址不能超过16个字符");
}
if (strlen($phone)!=11) {
  array_push($msg,"电话必须为11位");
}
if (strlen($email)>50) {
  array_push($msg,"email不能超过50个字符");
}

switch ($depart_name) {
  case '市场部':
  case '财务部':
  case '研发部':
  case '人力资源部':
  case '后勤部':
    break;
  default:
    echo "未知错误";
    exit;
    break;
}

$name_reg="/[\x{4e00}-\x{9fa5}]+/u";
$phone_reg="/^([1]\d{10}|([\(（]?0[0-9]{2,3}[）\)]?[-]?)?([2-9][0-9]{6,7})+(\-[0-9]{1,4})?)$/";
$email_reg="/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";
if (reg($name_reg,$name)) {
  array_push($msg,'姓名必须是汉字,且最多三个字符');
}
if (reg($name_reg,$address)) {
  array_push($msg,'地址必须是汉字,且最多只能有16个字符');
}
if (reg($phone_reg,$phone)) {
  array_push($msg,$phone."不符合手机号格式");
}
if (reg($email_reg,$email)) {
  array_push($msg,$email.'不符合邮箱格式');
}
if (!empty($msg)) {
  foreach ($msg as $value) {
    echo nl2br($value."\n");
  }
  exit;
}
try {
  $PDO = new PDO("mysql:host=127.0.0.1;dbname=contact;charset=utf8","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
  echo "数据库连接失败".$e;
}
$sql = "insert into contactinfo(name,depart_name,address,phone,email) values(?,?,?,?,?)";
$send=$PDO->prepare($sql);
$send->execute(array($name,$depart_name,$address,$phone,$email));
if ($send->rowCount()==1) {
  echo '<script>alert("用户创建成功");</script>';
}else {
  echo '<script>alert("用户创建失败")</script>';
}
function pMessage($paremeter_1){
  return strip_tags(htmlspecialchars(trim($paremeter_1)));
}
function reg($paremeter_1,$paremeter_2){
  if (preg_match($paremeter_1,$paremeter_2)) {
    return false;
  }
  return true;
}
 ?>
