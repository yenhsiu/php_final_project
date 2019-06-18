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
	<h1>已刪除新社員</h1>
	<div class="content">
<?php

$link=mysqli_connect('localhost','root','imyan1225','xdband');

$id=$_GET["id"];
$SQLDelete = "DELETE FROM idped WHERE id='$id'";
$result = mysqli_query($link,$SQLDelete);

$SQLDelete = "DELETE FROM member WHERE id='$id'";
$result = mysqli_query($link,$SQLDelete);

$SQL = "SELECT * FROM member";
echo "<table border='1'>";
if($result=mysqli_query($link,$SQL)){
	while($row=mysqli_fetch_assoc($result)){
		echo"<tr>";
		echo "<td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["phone"]."</td><td>".$row["position"]."</td><td>".$row["instrument"]."</td><td>"."<a href='update.php?id=".$row["id"]."'>修改</a>"."</td><td>"."<a href='del.php?id=".$row["id"]."'>刪除</a>"."</td>";
		echo"</tr>";
	}	
}
echo "</table>";

mysqli_close($link);
?>