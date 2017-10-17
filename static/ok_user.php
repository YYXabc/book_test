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
  <h1 class="text-center">欢迎</h1>
  <div class="col-lg-4 col-md-4 col-sm-4">

  </div>
  <div class="col-lg-4 col-md-4 col-sm-4">
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
