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
  <h1 class="text-center">欢迎后台管理</h1>
  <div class="col-lg-4 col-md-4 col-sm-4">
    <h3 >添加书籍</h3>
    <form class="form-horizontal" action="" method="post" >
      <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">书名</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="name" placeholder="请输入书名">
        </div>
      </div>
      <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">作者</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="author" placeholder="请输入作者">
        </div>
      </div>
      <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label" >价格</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="price" pattern="\d{1,3}" placeholder="请输入价格不超过999元不低于1元">
        </div>
        <div class="col-sm-8">
          <input type="submit" name="" value="提交" class="btn btn-success">
        </div>
      </div>
    </form>
    <?php include 'ok_mysql.php'?>
  </div>

  <div class="col-lg-4 col-md-4 col-sm-4">
    <form class="form-horizontal" action="" method="post" >
      <label for="firstname" class="col-sm-0 control-label">删除</label>
      <input type="text" class="form-control" name="delete" placeholder="输入书名">
      <input type="submit" name="" value="确定" class="btn btn-success">
    </form>
    <?php
      $name = $_REQUEST['delete'];
      //echo $name;

      function mysql_delete(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "book";
        global $name;
        $conn = new mysqli($servername, $username, $password, $dbname);
        // 检测连接
        if ($conn->connect_error) {
            die("连接失败: " . $conn->connect_error);
        }
        $sql = "delete from book_tb where book_name='$name'";
        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
      mysql_delete();
    ?>
    <?php
    function mysql_display(){
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "book";

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
      }
      $sql = "select *from book_tb";
      $id = 1;
      $result = $conn->query($sql);
      if ($result->num_rows >0) {
        echo'<table class="table table-hover">';
        echo'<thead>';
          echo'<tr>';
            echo'<th>编号</th>';
            echo'<th>书名</th>';
            echo'<th>作者</th>';
            echo'<th>价格</th>';
          echo'</tr>';
        echo'</thead>';
        while($row = $result->fetch_assoc()){
          //echo "id:".$row['book_id']."author:".$row['book_author'].$row['book_price'];
            echo'<tr>';
              echo'<td>'.$id++.'</td>';
              echo'<td>'.$row['book_name'].'</td>';
              echo'<td>'.$row['book_author'].'</td>';
              echo'<td>'.$row['book_price'].'元'.'</td>';
            echo'</tr>';
        }
        echo'</div>';
      }else{
        echo"0000";
      }
      $conn->close();
    }
    mysql_display();
  ?>
  <div class="col-lg-4 col-md-4 col-sm-4">

  </div>
</body>
</html>
