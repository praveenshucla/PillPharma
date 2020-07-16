<!doctype html>
<html>
<head>
<meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="http://localhost/Pills/style.css"/>
<meta charset="utf-8">
<title>Pill Search</title>
	</head>
<body>

  <?php

  $username = $_GET['username'];
  $password = $_GET['password'];
   
  if($username=='admin')
  {
    if($password=='admin'){

      echo "<script type=\"text/javascript\">window.location.replace('http://localhost/Pills/admin/home.php');</script>";
    }
    else {
      echo '<br>Password Incorrect .. Try Again <br><br><a href="index.php" class="glow">Back</a>';
    }
  }
  else if($username="\0"&&$password="\0"){
    echo '<br>Incorrect credentials. Try Again! <br><br><a href="index.php" class="glow">Back</a>';
  }
  else {
    echo '<br>Username Incorrect  <br><br><a href="index.php" class="glow">Back</a>';
  }

  ?>
