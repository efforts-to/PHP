<script>
  function del(){
    if (!confirm("确认删除么？")) {
      return false;
    }
  }

</script>
<?php
echo '<style media="screen">
    *{
      margin: 0;
      padding: 0;
    }
    body{
      text-align:center;
    }
    .main{
      width: 1270px;
      margin: 0 auto;
      border: 1px solid #333;
      text-align: center;
      }
      .main div{
        display:flex;
      }
      main>div>div{
        display: flex;
        border: 1px solid #333;
      }
      div,p{
        border: 1px solid #333;
        position:relative;
      }
      main>div>div{
        width:80px;
      }
      p{
        width:175px;
      }
      form{
        display: flex;
        height: 20px;

      }
      input{
        width:100%;
        outline: none;
      }
      select{
        width:175px;
      }
      .sure{
        width:40px;
      }
      .cancel{
        position:absolute;
        right:50px;
      }
    </style>';
try{
  $PDO=new PDO("mysql:host=127.0.0.1;dbname=contact;charset=utf8","root","");
} catch (PDOException $e) {
  echo "数据库连接失败".$e-getMessage();
}
if (!isset($_POST['eValue'])) {
  getMsg($PDO,-1);
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
  if (isset($_POST['editor'])) {
    update($PDO);
  }else if(isset($_POST['delete'])){
    delete($PDO);
  }elseif (isset($_POST['com_update'])) {
    update_com($PDO);
  }
}
function getMsg($PDO,$paremeter_1){//查询数据
  header('Content-Type:text/html;charset=utf-8');
  $sql = "select * from contactinfo";
  $send=$PDO->prepare($sql);
  $send->execute();
  $result=$send->fetchAll(PDO::FETCH_NUM);
  echo '<div class="main">';
  echo '<div style="font-size:30px"><b style="margin:0 auto">员工信息表</b></div>';
  echo '<div>
        <div style="width:80px;"></div>
        <p>Id</p>
        <p>姓名</p>
        <p>所属部门</p>
        <p>家庭住址</p>
        <p>联系电话</p>
        <p>Email</p>
        <div style="box-sizing: border-box;width:124px;">&nbsp</div>
        </div>';
  $num=0;
  for ($i=0;$i<count($result);$i++) {
    $num++;
    echo '<div>
            <div style="width:80px">
              <form style="margin:0" method="post" action="./contact_info.php" >
                <input type="submit" name="editor[]" value="编辑">
                <input type="hidden" name="eValue" value='.$num.'>
                <input type="hidden" name="eSelect" value='.$result[$i]['2'].'>
              </form>
              <form style="margin:0" method="post" action="./contact_info.php"  onsubmit="return del()" >
                <input type="submit" name="delete"value="删除" >
                <input type="hidden" name="value" value='.$result[$i]['0'].'>
              </form>
             </div>';
      if (!empty($paremeter_1)) {
        $com_value=null;
        if (($paremeter_1-1)==$i) {
          echo '<form action="./contact_info.php" method="POST">';

          for($m=0;$m<count($result[$i]);$m++) {
            if ($m==0) {
              $com_value=$result[$i][$m];
              echo '<p>'.$com_value.'</p>';
              $m++;
            }
            if ($m==2) {
              echo '    <div><select  name="up_to_db[]">
                        <option value="市场部"';
                        if($_POST['eSelect']=='市场部')echo 'selected';
              echo ' >市场部</option>
                        <option value="财务部"';
                        if($_POST['eSelect']=='财务部')echo 'selected';
              echo ' >财务部</option>
                        <option value="研发部"';
                        if($_POST['eSelect']=='研发部')echo 'selected';
              echo ' >研发部</option>
                        <option value="人力资源部" ';
                        if($_POST['eSelect']=='人力资源部')echo 'selected';
              echo '>人力资源部</option>
                        <option value="后勤部"';
                        if($_POST['eSelect']=='后勤部')echo 'selected';
              echo ' >后勤部</option>
                      </select></div>';
                      $m++;
            }
            echo '<p><input type="text" name="up_to_db[]" value="'.$result[$i][$m].'"/></p>';
          }
          echo '<div style="box-sizing: border-box; width:124px;">
              <input type="submit" name="com_update" class="sure" value="确定"/>
              <input type="hidden" name="com_value" value="'.$com_value.'"/>
              </form>
          </div>
          <form action="./contact_info.php" class="cancel" method="POST">
            <input type="submit" name="can_update" value="取消">
          </form>';
        }else {
          for($m=0;$m<count($result[$i]);$m++) {
            echo '<p>'.$result[$i][$m].'</p>';
          }
          echo '<div style="flex:1">&nbsp</div>';
        }
      }

    echo '</div>';
  }
  echo '</div>';
  echo '<a href="add.php">新增员工</a>';

}
function update($PDO){
  getMsg($PDO,$_POST['eValue']);
}
function update_com($PDO){
  if (empty($_POST['up_to_db'])) {
    exit;
  }
  $msg=array();
  foreach ($_POST['up_to_db'] as $value) {
    if (empty(htmlspecialchars(trim($value)))) {
      echo "<script>alert('各项不能为空')</script>";
      exit;
    }
  }
  $name=pMessage($_POST["up_to_db"][0]);
  $depart_name=pMessage($_POST["up_to_db"][1]);
  $address=pMessage($_POST["up_to_db"][2]);
  $phone=pMessage($_POST["up_to_db"][3]);
  $email=pMessage($_POST["up_to_db"][4]);
  $id = pMessage($_POST["com_value"]);


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

  $s_check=array();
  for ($i=0; $i <count($_POST['up_to_db']); $i++) {
    array_push($s_check,$_POST['up_to_db'][$i]);
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
  if (!preg_match($phone_reg,$phone)) {
    array_push($msg,"不符合手机号格式");
  }
  if (!preg_match($email_reg,$email)) {
    array_push($msg,'不符合邮箱格式');
  }
  if (!empty($msg)) {
    foreach ($msg as $value) {
      echo nl2br("\n".$value);
    }
    exit;
  }
  $s_sql="select * from contactinfo where id=?";
  $s_send=$PDO->prepare($s_sql);
  $s_send->execute(array($id));
  $s_result=$s_send->fetch(PDO::FETCH_NUM);
  $c_num=0;
  for ($i=1; $i <count($s_result); $i++) {
    for ($m=0; $m < count($s_check); $m++) {
      if($s_result[$i]==$s_check[$m]){
        $c_num++;
      }
    }
  }
  if ($c_num==count($s_check)) {
    echo "<script>alert('没有修改用户信息')</script>";
    exit;
  }
  $sql = "update contactinfo set name=?,depart_name =?,address =?,phone =?,email=? where id=?";
  $send=$PDO->prepare($sql);
  $send->execute(array($name,$depart_name,$address,$phone,$email,$id));
  if ($send->rowCount()==1) {
    echo '<script>alert("用户信息修改成功");window.location.href="./contact_info.php"</script>';
  }else {
    echo '<script>alert("用户信息修改失败")</script>';
  }
}
function delete($PDO){
  if (empty($_POST)) {
    exit;
  }
  $sql = "delete from contactinfo where id=?";
  $d_sql = $PDO->prepare($sql);
  $d_sql->execute(array($_POST['value']));
  if ($d_sql->rowCount()==1) {
    echo "<script>window.location.href='./contact_info.php'</script>";
  }else {
    echo "<script>alert('删除失败')</script>";
  }
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
