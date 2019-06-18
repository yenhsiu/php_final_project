<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>高大熱音預約系統</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="xd.css">
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

    <header>
	<h1>練團室借用紀錄</h1>
		<div class="content">
      <!-- <img src="https://scontent.fkhh1-1.fna.fbcdn.net/v/t1.0-9/22007854_1557838870949983_6054432818953401935_n.jpg?_nc_cat=101&_nc_ht=scontent.fkhh1-1.fna&oh=b7a3c25a2efb5395878087aa8d81ebb2&oe=5D9D31CE" alt="XDband" class="profile-image"> -->
<!--       <h1 class="tag name">Welcome to XD band</h1> -->
<?php
$reservation_name = $_GET["reservation_name"];
$value = $_GET["reservation_time"];
$add = $value%10;
$reservation_date = date("Y/m/d",strtotime($today."+".$add." day"));
$reservation_time = floor($value/10);

// echo $reservation_date."<br/>";
// echo $reservation_time;

$link=mysqli_connect('localhost','root','imyan1225','xdband');

$SQLCreate="INSERT into reservation(no, reservation_name, reservation_time, reservation_date)VALUES('$no','$reservation_name','$reservation_time','$reservation_date')";

$result=mysqli_query($link,$SQLCreate);
$SQL = "SELECT * FROM reservation";
echo "<table border='1'>";
if($result=mysqli_query($link,$SQL)){
	while($row=mysqli_fetch_assoc($result)){
		echo"<tr>";
		echo "<td>".$row["no"]."</td><td>".$row["reservation_name"]."</td><td>".$row["reservation_date"]."</td><td>第".$row["reservation_time"]."節</td><td>"."<a href='reservation_del.php?no=".$row["no"]."'>刪除</a>"."</td>";
		echo"</tr>";
	}	
}
echo "</table>";

mysqli_close($link);
?>

</div>
    </header>
    <footer>
      <p class="copyright">Copyright 2019, PHP team</p>
    </footer>
  </body>
  </html>

