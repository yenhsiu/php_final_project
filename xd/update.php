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
	echo"<div class='main-nav'><ul class='nav'><li class='name'><a href='add.php'>XD band</a></li>";
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
	<h1>修改社員</h1>
	<div class="content">

<?php

$id=$_GET["id"];
$name=$_GET["name"];
$phone=$_GET["phone"];
$position=$_GET["position"];
$instrument=$_GET["instrument"];
$link=mysqli_connect('localhost','root','imyan1225','xdband');


$SQLUpdate = "SELECT * FROM member WHERE id='$id'";
if ($result=mysqli_query($link,$SQLUpdate)){
	while($row=mysqli_fetch_assoc($result)){
		echo "<form action ='updateresult.php' method ='post'>";

		echo "學號: ".$row["id"]." </br>";
		echo "<input type='hidden' name='id' value=".$row["id"].">";

		echo "姓名: <input type=text name='name' value=".$row["name"]."></br>";

		echo "電話: <input type=text name='phone' value=".$row["phone"]."></br>";

		echo "職位: <input type=text name='position' value=".$row["position"]."></br>";
		
		echo "樂器: <input type=text name='instrument' value=".$row["instrument"]."></br>";
		echo "<input type ='submit'>";
		echo "</form>";
	}
}
mysqli_close($link);
?>