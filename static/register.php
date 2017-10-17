<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="jquery-3.2.1.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js"type="text/javascript"></script>
<style>
body{
  background-image:url(a.jpg);
}
</style>
</head>
<body>
<div class="col-lg-4 col-md-4 col-sm-4">
  <h2 class ="text-center">注册新用户</h2>
  <form class="form-horizontal" role="form" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <div class="form-group">
    <label for="firstname" class="col-sm-3 control-label">user</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="a" placeholder="请输入名字" width="35" maxlength="16">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-3 control-label">pass</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" name="b" placeholder="请输入密码" maxlength="16">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-3 control-label">pass</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" name="d" placeholder="请再次输入密码" maxlength="16">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-3 control-label">name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="c" placeholder="请输入昵称" maxlength="10" >
    </div>
    <div class="col-sm-6">
    </div>
    <div class="col-sm-6">
      <br>
      <input type="submit" name="" value="注册" class="btn btn-success">
    </div>
  </div>
  <?php
    $user = $_REQUEST['a'];
    $pass = $_REQUEST['b'];
    $a_pass = $_REQUEST['d'];
    $name = $_REQUEST['c'];
    $user_sql=array(404115964);
    //echo $user,"<br>",$pass,"<br>",$a_pass,"<br>",$name,"<br>";
    function mysql_insert(){
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "book";
      $table = "register";
      global $user, $pass ,$a_pass ,$name;
      try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into $table (user, pass, name)
        values('$user', '$pass', '$name')";
        $conn->exec($sql);
        //echo "OK";
      }
      catch(PDOException $e){
        //echo $sql . "<br>" . $e->getMessage();
      }
      $conn = null;
    }
    function mysql_judge(){
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "book";
      global $user_sql;

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
      }
      $sql = "select user from register";
      $result = $conn->query($sql);
      if ($result->num_rows >0) {
        while($row = $result->fetch_assoc()){
          array_push($user_sql,$row['user']);
          //echo $row['user'],"<br>";
        }
      }else{
        echo"0000";
      }
      $conn->close();
    }
    mysql_judge();
    //判断
    if($user =='' || $pass=='' || $a_pass=='' || $name==''){
      echo "<h3 class='text-danger'>请输入完整信息</h3>";
    }
    else if (strlen($user)<6) {
      echo "<h3 class='text-danger'>user不足6位</h3>";
    }
    else if (strlen($pass)<6) {
      echo "<h3 class='text-danger'>pass不足6位</h3>";
    }
    else if($pass!=$a_pass &&$pass!="" &&$a_pass!=""){
      echo "<h3 class='text-danger'>两次密码输入不一致</h3>";
    }

    else if (strlen($user)<2) {
      echo "<h3 class='text-danger'>不足2位</h3>";
    }
    //判断数据库是否有重复的user
    else if(!array_key_exists($user,$user_sql)){
      echo "<h3 class='text-danger'>用户名已经被注册</h3>";
    }

    else{
      echo "<h3 class='text-success'注册成功</h3>";
      //注册成功写入mysql
      mysql_insert();
      echo '<script type="text/javascript" src="re_ok.js">';
      echo '</script>';
    }
  ?>
</div>
  </form>
</body>
</html>
