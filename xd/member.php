<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>高大熱音預約系統</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="class.css">
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
    <header>
	<h1>社員名單</h1>
		<div class="content">
      <!-- <img src="https://scontent.fkhh1-1.fna.fbcdn.net/v/t1.0-9/22007854_1557838870949983_6054432818953401935_n.jpg?_nc_cat=101&_nc_ht=scontent.fkhh1-1.fna&oh=b7a3c25a2efb5395878087aa8d81ebb2&oe=5D9D31CE" alt="XDband" class="profile-image"> -->
<!--       <h1 class="tag name">Welcome to XD band</h1> -->
<?php
$id=$_GET["id"];
$name=$_GET["name"];
$phone=$_GET["phone"];
$position=$_GET["position"];
$instrument=$_GET["instrument"];


$link=mysqli_connect('localhost','root','imyan1225','xdband');

$SQLCreate="INSERT into idpwd(id, name, pwd)VALUES('$id','$name','$id')";
$result = mysqli_query($link,$SQLCreate);

$SQLCreate="INSERT into member(id, name, phone, position, instrument)VALUES('$id','$name','$phone','$position','$instrument')";
$result=mysqli_query($link,$SQLCreate);

$SQL = "SELECT * FROM member";
if($_SESSION["login"]=="manager")
{
    echo "<table border='1'>";
    if($result=mysqli_query($link,$SQL)){
      while($row=mysqli_fetch_assoc($result)){
        echo"<tr>";
        echo "<td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["phone"]."</td><td>".$row["position"]."</td><td>".$row["instrument"]."</td><td>"."<a href='update.php?id=".$row["id"]."'>修改</a>"."</td><td>"."<a href='del.php?id=".$row["id"]."'>刪除</a>"."</td>";
        echo"</tr>";
      }	
    }
    echo "</table>";
    echo "<a href='add.php'>新增成員</a>";
}
else
{
    echo "<table border='1'>";
    if($result=mysqli_query($link,$SQL)){
      while($row=mysqli_fetch_assoc($result)){
        echo"<tr>";
        echo "<td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["phone"]."</td><td>".$row["position"]."</td><td>".$row["instrument"]."</td>";
        echo"</tr>";
      }	
    }
    echo "</table>";
}

mysqli_close($link);
?>

</div>
    </header>
    <footer>
      <p class="copyright">Copyright 2019, PHP team</p>
    </footer>
  </body>
  </html>