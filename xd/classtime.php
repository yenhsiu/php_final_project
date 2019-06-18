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
	<h1>社課時間表</h1>
		<div class="content">
      <!-- <img src="https://scontent-tpe1-1.xx.fbcdn.net/v/t31.0-8/23845964_849192018592746_6111916572112665708_o.jpg?_nc_cat=109&_nc_ht=scontent-tpe1-1.xx&oh=a438ca10177c2c9edc06df56f98eb7a0&oe=5D7D0CB9" alt="XDband" class="profile-image"> -->
<!--       <h1 class="tag name">Welcome to XD band</h1> -->
<?php
session_start();
$id = $_POST["id"];

$link=mysqli_connect('localhost','root','imyan1225','xdband');

$SQL="SELECT * FROM classtime";

echo "<table border='1' width='500' height='50'>";
if($_SESSION["login"]=="manager")
{
  if ($result=mysqli_query($link,$SQL)) {
    while ($row=mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td bgcolor='gold'>".$row["星期"]."</td><td bgcolor='lightpink'>".$row["時間"]."</td><td bgcolor='lightgray'>".$row["樂器"]."</td><td>"."<a href='class_update.php?id=".$row["id"]."'>修改</a>"."</td><td>"."<a href='class_del.php?id=".$row["id"]."'>刪除</a>"."</td>";
      echo "</tr>";
    }
    
  }
  echo "</table>";

}
else{
  if ($result=mysqli_query($link,$SQL)) {
    while ($row=mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td bgcolor='gold'>".$row["星期"]."</td><td bgcolor='lightpink'>".$row["時間"]."</td><td bgcolor='lightgray'>".$row["樂器"]."</td>";
      echo "</tr>";
    }
    
  }
  echo "</table>";
}
?>
</div>
    </header>
    <footer>
      <p class="copyright">Copyright 2019, PHP team</p>
    </footer>
  </body>
  </html>

