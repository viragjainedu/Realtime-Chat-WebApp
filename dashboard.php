<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    
<?php
session_start();

echo '<center>';

echo 'Username is' . $_SESSION["Username"] . '<br>' ;
echo 'Password is' . $_SESSION["Password"] . '<br>';
print_r($_SESSION);

?>

<center>

<form method = "get" action = "/Whatsapp/logout.php">
    <td>
    <input type = "submit" value = "Logout"> 
    <input type = "button" value = "Back to Main Page" onClick="document.location.href='/Whatsapp/mainpage.php'"> 
    <!-- <input type="button" value="Logout"  onClick="document.location.href='/Whatsapp/logout.php'" /> -->
    </td>
</form>     


</body>
</html>