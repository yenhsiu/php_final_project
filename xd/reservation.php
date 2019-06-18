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

    <header>
	<h1>練團室申請表</h1>
		
	<form action ="reservation_record.php" method="GET">
	預約人 : <input type ="text" name ="reservation_name" required="">	<input type = "submit"><br/>
<div class="content">
<?php
	$weekarray=array("日","一","二","三","四","五","六");
	$today = date("Y/m/d");
	echo "<table width=300 heigh=200 cellpadding=5 border=1>";

	for($i=0;$i<14;$i++){
	 echo "<tr>";
	 for($j=0;$j<9;$j++)
	 {
	  if($i==0)
	  {
	    if($j==0) {echo"<td></td>";}
	    elseif($j==1) {echo"<td>"."時段"."</td>";}
	    else
	    {
	    	$this_day = date("Y/m/d",strtotime($today."+".($j-2)." day"));
	    	echo"<td>".$this_day."(".$weekarray[date("w")+($j-2)].")</td>";
	    }
	  }

	  else if($j==0)
	  {
	  	echo"<td>".$i."</td>";
	  }

	  else if($j==1)
	   {
    	if ($i==1){echo"<td>"."8:00~9:00"."</td>";}
    	elseif ($i==2){echo"<td>"."9:00~10:00"."</td>";}
    	elseif ($i==3){echo"<td>"."10:00~11:00"."</td>";}
		elseif ($i==4){echo"<td>"."12:00~13:00"."</td>";}
		elseif ($i==5){echo"<td>"."13:00~14:00"."</td>";}
		elseif ($i==6){echo"<td>"."14:00~15:00"."</td>";}
		elseif ($i==7){echo"<td>"."15:00~16:00"."</td>";}
		elseif ($i==8){echo"<td>"."17:00~18:00"."</td>";}
		elseif ($i==9){echo"<td>"."19:00~20:00"."</td>";}
		elseif ($i==10){echo"<td>"."20:00~21:00"."</td>";}
		elseif ($i==11){echo"<td>"."21:00~22:00"."</td>";}
		elseif ($i==12){echo"<td>"."22:00~23:00"."</td>";}
		elseif ($i==13){echo"<td>"."23:00~24:00"."</td>";}
	   }

	  else
	  {
	 	$link=mysqli_connect('localhost','root','imyan1225','xdband');
		$SQL = "SELECT * FROM reservation";
		$result=mysqli_query($link,$SQL);
		if($result=mysqli_query($link,$SQL)){
			while($row=mysqli_fetch_assoc($result))
			{
				$getname = 0;
				$tt = date("Y/m/d",strtotime($today."+".($j-2)." day"));
				//  echo $row["reservation_date"]."</br>";
				//  echo $tt."</br>";
				//  echo $row["reservation_time"]."</br>";
				//  echo $i."</br>";

				if ($row["reservation_date"]==date("Y/m/d",strtotime($today."+".($j-2)." day")) && $row["reservation_time"]==$i)
				{
					$getname = 1;
					echo "<td align=center>".$row["reservation_name"]."</td>";
					break;
				}	
			}
			if ($getname==0)
			{
				$tt = (($i*10)+($j-2));
		 		 echo "<td align=center><input type =radio name='reservation_time'value=$tt required></td>";
			}
		}
		
		mysqli_close($link);
	    }
	 }
	 echo "</tr>";
	}
	echo "</table>";
	?>
</form>
</div>
    </header>
    <footer>
      <p class="copyright">Copyright 2019, PHP team</p>
    </footer>
  </body>
  </html>

