<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
	
	$sql = "Select * from users where username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);
	if($num == 1){
		$login = true;
		session_start();
		$_SESSION['loggedin']=true;
		$_SESSION['username']=$username;
		header("location: index.php");
	}
	else{
		$showError = "Invalid Credentials";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
</head>
<body>
<?php
if($login){
echo '<div class="alert">
<span class="closebtn" onclick="this.parentElement.style.display = ',';">&times;</span> 
  <strong>Success!</strong> You are Logged In.
</div>';
}
if($showError){
  echo '<div class="alert1">
  <span class="closebtn" onclick="this.parentElement.style.display = ',';">&times;</span> 
    <strong>Error! </strong>'. $showError.'
  </div>';
  }
?>
<div class="log">
<div class="logo">
<img src="logo.jpg" width="250px">
</div>
	<img class="wave" src="wave.png">
	<div class="container">
		<div class="img">
			<img src="Agri.png">
		</div>
		<div class="login-content">
			<form action="/Web Development Project/login.php" method="POST">
				<img src="avatar.jpg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" required>
					</div>
            	</div>
				<a href="#">Forgot Password?</a>
            	<b><button type="submit" class="btn">Login</button></b><br>
				<div class="sign">
				New User? <a href="signup.php"><u>Sign Up</u></a>
			    </div>
            </form>
        </div>
    </div>
</div>
    <script type="text/javascript" src="main2.js"></script>

</body>
</html>