<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>高大熱音預約系統</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="brrow.css">
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
	header("Location:login.php");
}

?>
<?php
session_start();
#$SQL1="SELECT * FROM manager WHERE id=$_POST['id']";
#$SQL2="SELECT * FROM idpwd WHERE pwd=$_POST['pwd']";

$input_id = $_POST["id"];
$input_pwd = $_POST["pwd"];
// echo $input_id."<br>";
// echo $input_pwd."<br>";


$link=mysqli_connect('localhost','root','imyan1225','xdband');

$SQL="SELECT * FROM manager";
if ($result=mysqli_query($link,$SQL)) {
	while ($row=mysqli_fetch_assoc($result)) 
	{
		// echo $row["id"]."<br>";
		// 	echo $row["pwd"]."<br>";
		if($row["id"]==$input_id)
		{
			if ($row["pwd"]==$input_pwd)
			{
				$_SESSION["login"]="manager";
				header("Location:xd.php");
			}
		}
	}
}


mysqli_close($link);

$link=mysqli_connect('localhost','root','imyan1225','xdband');
$SQL="SELECT * FROM idpwd";
if ($result=mysqli_query($link,$SQL)) {
	while ($row=mysqli_fetch_assoc($result)) 
	{
		if($row["id"]==$input_id)
		{
			if ($row["pwd"]==$input_pwd)
			{
				$_SESSION["login"]=$row["name"];
				header("Location:xd.php");
			}
			else
			{
				if($_SESSION["login"]=="manager")
				{
					header("Location:xd.php");
				}
				
			    header("Location:login.php");
			}
		}
	}
}
?>



