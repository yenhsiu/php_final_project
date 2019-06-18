<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>高大熱音預約系統</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="xd.css">
  <link href="https://fonts.googleapis.com/css?family=Muli%7CRoboto:400,300,500,700,900" rel="stylesheet"></head>
  <body>
    <div class="main-nav">
        <ul class="nav">
          <li class="name"><a href='xd.php'>XD band</li>
          <li><a href='login.php'>Login</a></li>
        </ul>
    </div>
    <header>
	<h1>開門表</h1>
		<div class="content">
      <!-- <img src="https://scontent.fkhh1-1.fna.fbcdn.net/v/t1.0-9/22007854_1557838870949983_6054432818953401935_n.jpg?_nc_cat=101&_nc_ht=scontent.fkhh1-1.fna&oh=b7a3c25a2efb5395878087aa8d81ebb2&oe=5D9D31CE" alt="XDband" class="profile-image"> -->
<!--       <h1 class="tag name">Welcome to XD band</h1> -->
      <?php
$link=mysqli_connect('localhost','root','imyan1225','xdband');
if($link)
{
	// echo "<h1>開門表</h1>";
}
else
{
  echo"fail<br/>";
}

$SQL = "SELECT * FROM 開門表";
echo "<strong><table style='border:5px #2E8B57 solid' border=3px dashed bgcolor=#FFFFFF >";
if($result=mysqli_query($link,$SQL))
{
  $temp;
  $tt='1';
  echo"<tr><td></td>";
  while($row=mysqli_fetch_assoc($result))
  {

    if($row["星期"] == $temp){
      continue;
    }
    else{
      echo "<td>".$row["星期"]."</td>";
      $temp = $row["星期"]; 
    }
  }
  echo"</tr>";
  for ( $i=1 ; $i<15 ; $i++ )
  {
    echo "<td>".$i."</td>";
    if($result=mysqli_query($link,$SQL))
    {
      while($row=mysqli_fetch_assoc($result))
      {
        if($row["節次"] == $i)
        {
          echo "<td>".$row["負責人"]."</td>";  
        }
      }
    }
    echo"</tr>";
  } 
}

echo "</table></strong>";
mysqli_close($link);
?>
</div>
    </header>
    <footer>
      <p class="copyright">Copyright 2019, PHP team</p>
    </footer>
  </body>
  </html>
