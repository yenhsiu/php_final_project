<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>高大熱音預約系統</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="brrow.css">
  <link href="https://fonts.googleapis.com/css?family=Muli%7CRoboto:400,300,500,700,900" rel="stylesheet"></head>
  <body>
  <header>
	<h1>成員登入</h1>
<form action="check.php" method="POST">						
<?php
if (isset($_SESSION["login"]))
{
    header("Location:xd.php");
}
else{
    echo "帳號:<input type='text' name='id'><br/>";
echo "密碼:<input type='Password' name='pwd'><br/>";
echo "<input type='submit'><br/><br/>";
}


?>
</form>

</div>
    </header>
    <footer>
      <p class="copyright">Copyright 2019, PHP team</p>
    </footer>
  </body>
  </html>