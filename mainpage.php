<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- CSS only -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
      <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body style="padding:5%">  


<?php
session_start();

// if(!isset($_COOKIE['Status'])) {
//   echo "The user is " . 'Offline'  . "<br>";
// } else {
//   echo "The user is ". $_COOKIE['Status'] . "<br>";
// }
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['status']) ) {

    if($_GET['status'] == 'offline')
    {
        setcookie("Status","Offline", time() + (3600), "/"); 
        header("Location: http://localhost:8080/Whatsapp/mainpage.php", true, 307);
    }
    if($_GET['status'] == 'online')
    {
        setcookie("Status","Online", time() + (3600), "/");
        header("Location: http://localhost:8080/Whatsapp/mainpage.php", true, 307); 
    }
    // setcookie("Password","", time() + (-3600), "/"); 
    // unset($_SESSION['Username']);
    // unset($_SESSION['Password']);
    // session_destroy();
    // header("Location: http://localhost:8080/Whatsapp/dashboard.php", true, 307);    
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['action2'])) {
    // setcookie("Username","", time() + (-3600), "/"); 
    // setcookie("Password","", time() + (-3600), "/"); 
    // unset($_SESSION['Username']);
    // unset($_SESSION['Password']);
    // session_destroy();
    echo('HELLO');
    header("Location: /Whatsapp/dashboard.php", true, 307);    
}
    
?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $_SESSION['Username'] ;?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php echo $_COOKIE['Status'] ;?></h6>
    <p class="card-text"></p>
    <input type = "button" value = "Hide Online" onClick="document.location.href='/Whatsapp/mainpage.php?status=offline'"> 
    <input type = "button" value = "Show Online" onClick="document.location.href='/Whatsapp/mainpage.php?status=online'"> 
  </div>
</div>

<br>

<form method = "GET" action = "/Whatsapp/dashboard.php">
    <td>
    <input type = "submit"  value = "Dashboard">
    <!-- <input type="button" value="dashboard" /> -->
    <input type ="hidden" name="action2" value="true" />

    </td>
</form> 
    
<div class="container">
    <div class="row d-flex justify-content-end">

    <div class="col-sm-2">
        <div class="navigation">

            <a class="button" href="/Whatsapp/logout.php">
            <img class="imgade" src="https://pbs.twimg.com/profile_images/378800000639740507/fc0aaad744734cd1dbc8aeb3d51f8729_400x400.jpeg">

            <div class="logout">LOGOUT</div>

            </a>

            </div>
        </div>

    </div>
</div>

  

<div id="container">
	<aside>
		<header>
			<input type="text" placeholder="search">
		</header>
		<ul>
			<li>
				<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" alt="">
				<div>
					<h2>Prénom Nom</h2>
					<h3>
						<span class="status orange"></span>
						offline
					</h3>
				</div>
			</li>
			
		</ul>
	</aside>
	<main>
		<header>
			<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/chat_avatar_01.jpg" alt="">
			<div>
				<h2>Chat with Vincent Porter</h2>
				<h3>already 1902 messages</h3>
			</div>
			<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_star.png" alt="">
		</header>
		<ul id="chat">
			<li class="you">
				<div class="entete">
					<span class="status green"></span>
					<h2>Vincent</h2>
					<h3>10:12AM, Today</h3>
				</div>
				<div class="triangle"></div>
				<div class="message">
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
				</div>
			</li>
			<li class="me">
				<div class="entete">
					<h3>10:12AM, Today</h3>
					<h2>Vincent</h2>
					<span class="status blue"></span>
				</div>
				<div class="triangle"></div>
				<div class="message">
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
				</div>
			</li>
			<li class="me">
				<div class="entete">
					<h3>10:12AM, Today</h3>
					<h2>Vincent</h2>
					<span class="status blue"></span>
				</div>
				<div class="triangle"></div>
				<div class="message">
					OK
				</div>
			</li>
			<li class="you">
				<div class="entete">
					<span class="status green"></span>
					<h2>Vincent</h2>
					<h3>10:12AM, Today</h3>
				</div>
				<div class="triangle"></div>
				<div class="message">
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
				</div>
			</li>
			<li class="me">
				<div class="entete">
					<h3>10:12AM, Today</h3>
					<h2>Vincent</h2>
					<span class="status blue"></span>
				</div>
				<div class="triangle"></div>
				<div class="message">
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
				</div>
			</li>
			<li class="me">
				<div class="entete">
					<h3>10:12AM, Today</h3>
					<h2>Vincent</h2>
					<span class="status blue"></span>
				</div>
				<div class="triangle"></div>
				<div class="message">
					OK
				</div>
			</li>
		</ul>
		<footer>
			<textarea placeholder="Type your message"></textarea>
			<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_picture.png" alt="">
			<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1940306/ico_file.png" alt="">
			<a href="#">Send</a>
		</footer>
	</main>
</div>


</body>
</html>