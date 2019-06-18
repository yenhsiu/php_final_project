<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>高大熱音預約系統</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="add.css">
  <link href="https://fonts.googleapis.com/css?family=Muli%7CRoboto:400,300,500,700,900" rel="stylesheet"></head>
  <body>
  <?php

session_start();

if(isset($_SESSION["login"])){
	echo"<div class='main-nav'><ul class='nav'><li class='name'><a href='xd.php'>XD band</a></li>";
	 echo "<li>Hi! ".$_SESSION["login"]."</a></li>";
     echo "<li><a href='logout.php'>Logout</a></li>";
     echo"</ul></div>";
}
else{
	echo"
	<div class='main-nav'>
        <ul class='nav'>
          <li class='name'><a href='xd.php'>XD band</li>
          <li><a href='login.php'>Login</a></li>
        </ul>
    </div>";
}

?>
header>
	<h1> `</h1>
	<div class="content">
    <?php
//加入熱音
session_start();

if ($_SESSION["login"]=="manager") 
{#管理員
   echo"<header><h1>申請紀錄</h1><div class='content'>";
 $grade=$_POST["grade"];//系級
 $name=$_POST["name"];//姓名
 $id=$_POST["id"];//學號
 $email=$_POST["email"];//信箱
 $link=mysqli_connect('localhost','root','imyan1225','xdband');
    if (empty($_POST["id"])) {
    mysqli_close($link);
    }
    else{
    $SQLCreate="INSERT into join(grade,name,id,email) VALUES ('$grade','$name','$id','$email')";
    mysqli_query($link,$SQLCreate); 
    mysqli_close($link);
    }

 }
 else if(isset($_SESSION["login"])){
   echo"<header><h1>你已經是社員了</h1><div class='content'>";
 }
 else{
    
    echo "<form action ='mail.php' method='post'>";
    echo "系級:<input type='text' name='grade' required=''><br/>";
    echo "姓名:<input type='text' name='name' required=''><br/>";
    echo "學號:<input type='text' name='id' required=''><br/>";
    echo "信箱:<input type='text' name='email' required=''><br/>";
    echo "<input type='submit'><br/><br/>";
 }

?>
</div>
    </header>
    <footer>
      <p class="copyright">Copyright 2019, PHP team</p>
    </footer>
  </body>
  </html>


