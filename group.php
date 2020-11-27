<?php

namespace Main;

use Classes\DB;
use Classes\Login;
use Classes\Image;

require_once('classes/DB.php');
require_once('classes/Login.php');
require_once('classes/Image.php');
require_once('templates/header.php');

$user_id = Login::isLogged();
echo $user_id;
$username = DB::_query('SELECT username FROM users WHERE id=:user_id', [ 'user_id' => $user_id ])[0]['username'];
echo $username;


// if(isset($_POST['message'])) {
//   $body = htmlspecialchars($_POST['message']);
	
	// The sender is you.
  $sender = Login::isLogged();
  // echo $sender;

//   	// Is the receiver an existing user...?
// 		// if($body != "") {
// 		// 	// If yes, Update DB.
// 		// 	DB::_query('INSERT INTO group_messages (id, sender, body) VALUES (:r, :s, :body)', [
// 		// 		'r' 	=> $user_id,
// 		// 		's' 	=> $username,
// 		// 		'body' 	=> $body
// 		// 	]);
// 		// }
// }

?>

  <style>
  body {
    margin: 0 auto;
    max-width: 800px;
    padding: 0 20px;
  }

  .container {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
  }

  .darker {
    border-color: #ccc;
    background-color: #ddd;
  }

  .container::after {
    content: "";
    clear: both;
    display: table;
  }

  .container img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
  }

  .container img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
  }

  .time-right {
    float: right;
    color: #aaa;
  }

  .time-left {
    float: left;
    color: #999;
  }
  </style>

  <h2>Group Messages</h2>

  <div class="main-div" id="main">

    <div class="container">
      <img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png" alt="Avatar" style="width:100%;">
      <p>Hello. How are you today?</p>
      <span class="time-right">Sent by Viragjain510</span>
    </div>


    <div class="container">
      <img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png" alt="Avatar" style="width:100%;">
      <p>Ekdum mast tu bata </p>
      <span class="time-right">Sent By Mudassir</span>
    </div>

  </div>
  
 
    <input type="text" class="input-phchat" id="js-messageBody" name="message" placeholder="Write your message" >
    <button onclick="myFunction()">Send in Group</button>
 

<script>

function myFunction() {
  console.log('hiii');
  document.getElementById("main").innerHTML +=  "<div class='container'><img src='https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png' alt='Avatar' style='width:100%;'><p>" + document.getElementById('js-messageBody').value + "</p><span class='time-right'>Sent By "  + '<?php echo $username ?>' + "</span></div>";
}
  </script>
  
</body>
  </html>
