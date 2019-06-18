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
	<h1>社團留言板</h1>
	<div class="content">


<?php
$name=$_POST["name"];
$message=$_POST["message"];
$link=mysqli_connect('localhost','root','imyan1225','xdband');

if (empty($_POST["message"])) 
              {
                $SQL="SELECT * FROM message";
                echo "<table border=0>";
                if ($result=mysqli_query($link,$SQL)) {
                while ($row=mysqli_fetch_assoc($result)) {
                  if($row["message"]==$temp_msg){continue;}
                  echo "<tr>".
                  "<td>".$row["name"]." 說："."</td>".
                  "<td>".$row["message"]."</td>";
                  echo "</tr>";
                  $temp_msg = $row["message"];
                  }
                }
                echo "</table>";
                mysqli_close($link);
              }
              else{
                $SQLCreate="INSERT into message(no,name,message) VALUES ('$no','$name','$message')";
                $result = mysqli_query($link,$SQLCreate);   
                $SQL="SELECT * FROM message";
                echo "<table border=0>";
                if ($result=mysqli_query($link,$SQL)) {
                while ($row=mysqli_fetch_assoc($result)) {
                  if($row["message"]==$temp_msg){continue;}
                      echo "<tr>".
                      "<td>".$row["name"]." 說："."</td>".
                      "<td>".$row["message"]."</td>";
                      echo "</tr>";
                      $temp_msg = $row["message"];}
                }
                echo "</table>";
                mysqli_close($link);
              }
?>
<form action="#" method="post">
姓名：<input type="text" name="name" required value="路人"><br/><br/>
<textarea name="message" value="想說什麼" rows='5' cols='30' required=""></textarea>
<input type="submit" name="">

</form>
	</div>
    </header>
    <footer>
      <p class="copyright">Copyright 2019, PHP team</p>
    </footer>
  </body>
  </html>