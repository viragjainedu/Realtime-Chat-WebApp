<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- CSS only -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <center>
    <p>You've loggged out successfully</p>
    
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET" ) {
  // setcookie("Username","", time() + (-3600), "/"); 
  // setcookie("Password","", time() + (-3600), "/"); 
  unset($_SESSION['Username']);
  unset($_SESSION['Password']);
  session_destroy();
}


print_r($_SESSION);

?>
</body>
</html>