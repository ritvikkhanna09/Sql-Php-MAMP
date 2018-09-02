<?php
include('server.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form action="login.php" method="post">
    <h1>Login</h1>  
    <fieldset>
      <label for="name">Username:</label>
      <input type="text" id="name" name="user_name">
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="user_password">
    </fieldset>
    <?php include('errors.php'); ?>
    <button type="submit" name="login">Login</button>
    <h4>New User? <a href="signup.php">Sign up Here</a></h4>
  </form>  
</body>
</html>