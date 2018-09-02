<?php
session_start();


$username = "";
$email    = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', 'root', 'registration');




if (isset($_POST['sign_up'])) {
  $username = $_POST['user_name'];
  $email = $_POST['user_email'];
  $password = $_POST['user_password'];
  $password_confirm = $_POST['user_password_confirm'];
  if (empty($username)) {
    array_push($errors, "Username is required"); 
  }
  if (empty($email)) {
    array_push($errors, "Email is required"); 
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if ($password != $password_confirm) {
    array_push($errors, "Passwords mismatch");
  }

  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) {
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }
  if (count($errors) == 0) {

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')" ;
  	mysqli_query($db, $query);
    array_push($errors, "Successfully Registered");

  }
}




if (isset($_POST['login'])) {
  $username =$_POST['user_name'];
  $password =$_POST['user_password'];

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: about.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}



