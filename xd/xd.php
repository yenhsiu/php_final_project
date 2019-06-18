<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>高大熱音預約系統</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="lobby.css">
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
      <img src="https://scontent.fkhh1-1.fna.fbcdn.net/v/t1.0-9/22007854_1557838870949983_6054432818953401935_n.jpg?_nc_cat=101&_nc_ht=scontent.fkhh1-1.fna&oh=b7a3c25a2efb5395878087aa8d81ebb2&oe=5D9D31CE" alt="XDband" class="profile-image">
<!--       <h1 class="tag name">Welcome to XD band</h1> -->
      <ul class="skills">
          <li><strong><a href='info.php'>關於我們</strong><br><br><img src=us.png></a></li>
          <li><strong><a href='reservation.php'>借練團室</strong><br><br><img src=b.png></a></li>
          <li><strong><a href='reservation_record.php'>紀錄查詢</strong><br><br><img src=record.png> </a></li>
          <li><strong><a href='message.php'>意見回饋</strong><br><br><img src=s.png></a></li>
        </ul>
    </header>
    <footer>
      <p class="copyright">歡迎加入熱音社<br>Copyright 2019, PHP team</p>
    </footer>
  </body>
  </html>


