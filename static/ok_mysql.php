<?php
  $name = $_REQUEST['name'];
  $author = $_REQUEST['author'];
  $price = $_REQUEST['price'];
  //echo "name:".$name."author:".$author."price".$price;
  function mysql_insert(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "book";
    $table = "book_tb";
    global $name,$author,$price;

    try{
      $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "insert into $table (book_name,book_author,book_price)
      values('$name', '$author', '$price')";
      $conn->exec($sql);
      //echo "OK";
    }
    catch(PDOException $e){
      //echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    echo "插入成功";
  }
  if($name =="" || $author =="" || $price ==""){
    echo"";
  }
  else{
    mysql_insert();
  }
?>
