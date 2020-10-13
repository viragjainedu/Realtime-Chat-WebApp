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
<body style="padding:5% ; color:white" >  


<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username']) ) {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "logindetails";

	 //2nd part
	 // Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT * FROM login_details where username='".$_GET["username"]."' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "Search result found <br>";
			echo "Username: " . $row["username"]. "<br>" ."E-mail: " . $row["email"]. "<br>" ."Phone: " . $row["phone"]."<br>" ."<br>" ;
		}
		} else {
		echo "0 results";
		}
		$conn->close();
}
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
    
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['action2'])) {
 
    echo('HELLO');
    header("Location: /Whatsapp/dashboard.php", true, 307);    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "logindetails";

	 //2nd part
	 // Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT username, password FROM login_details";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "Usenrname: " . $row["username"]. "<br>"."Password: " . $row["password"]. "<br>";
		}
		} else {
		echo "0 results";
		}
		$conn->close();

}
    
?>

<div class="containter">
	<div class="row">
		<div class="col-sm-4">
			
				
	<div class="container p-2">
		<br/>
		<div class="row justify-content-center">
			<div class="col-12">
				<form class="card card-sm" action="mainpage.php" method="get"> 
					<div class="card-body row no-gutters align-items-center">
						<div class="col-auto">
							<i class="fas fa-search h4 text-body"></i>
						</div>
						<!--end of col-->
						<div class="col">
							<input class="form-control form-control-sm form-control-borderless" type="search" name="username" placeholder="Search Username">
						</div>
						<!--end of col-->
						<div class="col-auto">
							<button class="btn btn-sm btn-success" type="submit" onClick="document.location.href='/Whatsapp/mainpage.php?search='">Search</button>
						</div>
						<!--end of col-->
					</div>
				</form>
			</div>
			<!--end of col-->
			</div>
	</div>
	<div class="container">
		<div class="row justify-content-start">
			<div class="card" style="width: 18rem;">
				<div class="card-body">
				<h5 style="color:black" class="card-title"><?php echo $_SESSION['Username'] ;?></h5>
				<h6 class="card-subtitle mb-2 text-muted"><?php echo $_COOKIE['Status'] ;?></h6>
				<p class="card-text"></p>
				<input type = "button" value = "Hide Online" onClick="document.location.href='/Whatsapp/mainpage.php?status=offline'"> 
				<input type = "button" value = "Show Online" onClick="document.location.href='/Whatsapp/mainpage.php?status=online'"> 
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<br>
		<form method = "GET" action = "/Whatsapp/dashboard.php">
			<input type = "submit"  value = "Dashboard">
			<!-- <input type="button" value="dashboard" /> -->
			<input type ="hidden" name="action2" value="true" />
		</form> 

	</div>

</div>
		
	<div class="col-sm-8">

	
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



	</div>
	
	</div>
</div>



    

</body>
</html>