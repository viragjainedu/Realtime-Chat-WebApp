<html>
   
   <head>
         <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

      <style>
      body {
        font-family:Helvetica,Arial,sans-serif;
        background-image: url("whatsapp.jpg");
        color:#fff;
        }   
        .error {color: #FF0000;}
      </style>

   
 
   </head>
   
   <body>
       <center>

      <?php
         $nameErr = $emailErr = $genderErr = $phoneErr = $passwordErr =  $usernameErr =  "";
         $name = $email = $gender = $phone = $password = "";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST" and !isset($_POST['action'])) {

         
            if (empty($_POST["username"])) {
               $nameErr = "username is required";
            }else {
               $name = test_input($_POST["username"]);
            }
            
            if (empty($_POST["password"])) {
               $passwordErr = "Password is required";
            }else {
               $password = test_input($_POST["password"]);
            }

            if (empty($_POST["email"])) {
               $emailErr = "Email is required";
            }else {
               $email = test_input($_POST["email"]);
               
               if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
                  $emailErr = "Invalid email format"; 
                  $email = "";

               }
            }
            
            if (empty($_POST["phone"])) {
               $phone = "";
            }else {
               $phone = test_input($_POST["phone"]);
               
               if(!preg_match('/^[6-9]\d{9}$/', $phone)) {
                $phoneErr = "Invalid phone format";
                $phone = "";

              }
            }
            
            if (empty($_POST["gender"])) {
               $genderErr = "Gender is required";
            }else {
               $gender = test_input($_POST["gender"]);
            }

            
            //1st part
            if($usernameErr == "" && $passwordErr == "" &&  $phoneErr == "" && $genderErr == "" && $emailErr == ""  )
            {
                  //database authentication
               $servername = "localhost";
               $username = "root";
               $password = "";
               $dbname = "logindetails";

               $conn = new mysqli($servername, $username, $password,$dbname );

               if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
               }

               $sql = "SELECT username FROM login_details WHERE username='".$_POST["username"]."'";
               $result1 = $conn->query($sql);

               if ($result1->num_rows > 0) {
                     echo " This username is taken please take other username.<br>";
               } 
            
               $sql = "SELECT phone FROM login_details WHERE phone='".$_POST["phone"]."'";
               $result2 = $conn->query($sql);

               if ($result2->num_rows > 0) {
                     echo " This phone no is taken please take other phone no.<br>";
               } 
            
               $sql = "SELECT email FROM login_details WHERE email='".$_POST["email"]."'";
               $result3 = $conn->query($sql);

               if ($result3->num_rows > 0) {
                     echo " This email is taken please take other email.<br>";
               } 
               if($result1->num_rows == 0 and $result2->num_rows == 0 and $result3->num_rows == 0 ){
                     
                     $sql = "INSERT INTO login_details (username, password,phone,email) VALUES ('".$_POST["username"]."', '".$_POST["password"]."', '".$_POST["phone"]."', '".$_POST["email"]."')";
                     if ($conn->query($sql) === TRUE) {
                        echo "New record created successfully" . "<br>";
                     } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                     }
               }

               $conn->close();
            }
            


         }
         
         function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
         }

         if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['action'])) {
         
            session_start();
            if (empty($_POST["password"])) {
               $passwordErr = "Password is required";
            }else {
               $password = test_input($_POST["password"]);
            }
            
            if (empty($_POST["username"])) {
               $usernameErr = "Username is required";
            }else {
               $username = test_input($_POST["username"]);
            }

            if($usernameErr == "" && $passwordErr == "") 
            {

                     //database authentication
                     $servername = "localhost";
                     $username = "root";
                     $password = "";
                     $dbname = "logindetails";
      
                     $conn = new mysqli($servername, $username, $password,$dbname );
      
                     if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                     }
                     
                     $sql = "SELECT username FROM login_details WHERE username='".$_POST["username"]."'";
                     $result1 = $conn->query($sql);
                     
                    
                     if ($result1->num_rows == 0) {
                           echo " This username is not registered bro.<br>";
                     } 
                     else{
                        
                        $sql = "SELECT password FROM login_details WHERE password='".$_POST["password"]."'";
                        $result2 = $conn->query($sql);
                        if($result2->num_rows == 0){
                           echo " This username is correct but password is not correct bro.<br>";
                        }
                        else{
                           $conn->close();
                           setcookie("Status",'Online', time() + (3600), "/"); 
                           $_SESSION["Username"] = $_POST["username"]; 
                           $_SESSION["Password"] = $_POST["password"]; 
                           header("Location: http://localhost:8080/Whatsapp/mainpage.php", true, 307);
   
                        }                        
                     }
                     
            }
         }
      ?>



      <div class="container p-4">
         <div class="row">

         <div class="col-6">
      <h2>Register</h2>
          
      <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
         <table>
            <tr>
               <td>Username:</td>
               <td><input type = "text" name = "username">
                  <span class = "error">* <?php echo $nameErr;?></span>
               </td>
            </tr>
           
            <tr>
               <td>E-mail: </td>
               <td><input type = "text" name = "email">
                  <span class = "error">* <?php echo $emailErr;?></span>
               </td>
            </tr>
            <tr>
               <td>Password:</td>
                  <td><input type = "password" name = "password">
                  <span class = "error">* <?php echo $passwordErr;?></span>
               </td>
            </tr>
           
            <tr>
               <td>Phone:</td>
               <td> <input type = "text" name = "phone">
                  <span class = "error"><?php echo $phoneErr;?></span>
               </td>
            </tr>
          
            <tr>
               <td>Gender:</td>
               <td>
                  <input type = "radio" name = "gender" value = "female">Female
                  <input type = "radio" name = "gender" value = "male">Male
                  <span class = "error">* <?php echo $genderErr;?></span>
               </td>
            </tr>
				
            <td>
               <input type = "submit" name = "submit" value = "Submit"> 
            </td>
				
         </table>
			
      </form>
      </div>
    <div class="col-6">
      <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      
          <h2>Login</h2>
         <table>
            <tr>
               <td>Username:</td>
               <td><input type = "text" name = "username">
                  <span class = "error"></span>
               </td>
            </tr>
           
            <tr>
               <td>Password:</td>
               <td><input type = "password" name = "password">
               <span class = "error">* <?php echo $passwordErr;?></span>
               </td>
            </tr>

            <input type ="hidden" name="action" value="true" />

            <td>
               <input type = "submit" name = "submit" value = "Submit"> 
            </td>
				
         </table>
			
      </form>
      </div>
    

         </div>
      </div>
         
        
   </body>
</html>