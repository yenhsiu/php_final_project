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

if($_SESSION["login"]=="manager"){
	echo"<div class='main-nav'><ul class='nav'><li class='name'><a href='xd.php'>XD band</a></li>";
	 echo "<li>Hi! ".$_SESSION["login"]."</a></li>";
     echo "<li><a href='logout.php'>Logout</a></li>";
	 echo"</ul></div>";
	 $link=mysqli_connect('localhost','root','imyan1225','xdband');

$no=$_GET["no"];
$SQLDelete = "DELETE FROM reservation WHERE no='$no'";
$result = mysqli_query($link,$SQLDelete);

$SQL = "SELECT * FROM reservation";
echo "<table border='1'>";
if($result=mysqli_query($link,$SQL)){
	while($row=mysqli_fetch_assoc($result)){
		echo"<tr>";
		echo "<td>".$row["no"]."</td><td>".$row["reservation_name"]."</td><td>".$row["reservation_date"]."</td><td>".$row["reservation_time"]."</td><td>"."<a href='reservation_del.php?no=".$row["no"]."'>刪除</a>"."</td>";
		echo"</tr>";
	}	
}
echo "</table>";

mysqli_close($link);
}
else{
	echo "<h1>沒有權限</h1>";
	header("Refresh:1;url='xd.php");
}
?>
 



