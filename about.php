<?php 
  session_start(); 


  if (!isset($_SESSION['username'])) {
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="about-us">
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p><div style="float: left;">Welcome <strong><?php echo $_SESSION['username']; ?></strong></div>
        <div style="float: right;"><a href="about.php?logout='1'" style="color: red;">logout</a></div></p>
    <?php endif ?>
    <br><br>


  	<h1>About Us</h1>
    This is about me !

  </div>
</body>
</html>
