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
<body >
<div class="container">
  <h1 class="text-center">图书管理系统</h1>
  <div class="col-lg-3 col-md-3 col-sm-3">

  </div>
  <div class="col-lg-3 col-md-3 col-sm-3">
    <h2>后台登录</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id='a'>
    Name: <input name="user" type="text" size="30" id='user'class="form-control" value=""><br>
    Pass: <input name="pass"type="password" size="30" id = 'pass'class="form-control"placeholder="请输入密码"><br>
    <input type="submit" name="" value="login" class="btn btn-success">
    <br> <h3><a href="register.php">register</a></h3>
    <?php
      $name = $_REQUEST['user'];
      $pass = $_REQUEST['pass'];
      if($name == "新泽西的小杰克" && $pass =='404115964'){
        echo '<script type="text/javascript">window.location.href="ok.php";</script>';
      }
      else if ($name ="" || $pass =='') {
        # code...
        echo "";
      }
      else{
        echo '<br>','<h3 class="text-danger">密码或账号错误</h3>';
      }
    ?>
    </form>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-3">
    <h2>用户登录</h2>
    <form action="">
    Name: <input name="aaa" type="text" size="30"class="form-control"><br>
    Pass: <input name="bbb"type="password" size="30"class="form-control"placeholder="请输入密码"><br>
    <input type="submit" size="10" class="btn btn-success" value="登录">
    <?php
      $name = $_REQUEST['aaa'];
      $pass = $_REQUEST['bbb'];
      $key_sql = array("Peter"=>"35");
      function mysql_judge(){
        global $key_sql;
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "book";
        global $key_sql,$name,$pass;

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
          die("连接失败: " . $conn->connect_error);
        }
        $sql = "select user,pass from register";
        $result = $conn->query($sql);
        if ($result->num_rows >0) {
          while($row = $result->fetch_assoc()){
            $key_sql[$row['user']] = $row['pass'];
          }
        }else{
          echo"0000";
        }
        $conn->close();
      }
      mysql_judge();
      $a = False;
      foreach ($key_sql as $u => $p) {
        //echo $u." ".$p;
        //echo "<br>";
        if($u == $name and $p == $pass){
          echo '<script type="text/javascript">';
          echo "alert('欢迎$u');";
          echo"window.location.href='ok_user.php'";
          echo '</script>';
        }
        else if ($name =="" or $pass =="") {
          # code...
          echo "";
        }
        else{
          $a = true;
        }
      }
      //var_dump((bool) $a);
      if($a){
        echo "<h3 class='text-danger'>密码或账号输入错误</h3>";
      }
    ?>
    </form>
  </div>
  <div class="col-lg-3 col-md-3 col-sm-3">
  </div>
</div>

</body>
</html>
