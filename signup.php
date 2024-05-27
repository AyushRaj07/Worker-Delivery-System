<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $fname = $_POST["fname"];
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    $cpassword = $_POST["cpassword"];
    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
      $showError = "Username Already Exists";
    }
    else{
    if(($password == $cpassword)){
      $sql = "INSERT INTO `users` (`fname`, `username`, `password`, `dt`) VALUES ('$fname', '$username', '$password', current_timestamp())";
      $result = mysqli_query($conn, $sql);
      if ($result){
        $showAlert = true;
      }
    }
    else{
      $showError = "Passwords do not match";
    }
  }
}   
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style3.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <title>Sign Up</title>
  </head>
<body>
<?php
if($showAlert){
echo '<div class="alert">
<span class="closebtn" onclick="this.parentElement.style.display = ',';">&times;</span> 
  <strong>Success! </strong> Your account is successfully created and you can Log in now.
</div>';
}
if($showError){
  echo '<div class="alert1">
  <span class="closebtn" onclick="this.parentElement.style.display = ',';">&times;</span> 
    <strong>Try Again! </strong>'. $showError.'
  </div>';
  }
?>
<div class="logo">
<img src="logo.jpg" width="350px">
</div>
<div class="sign">
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="/Web Development Project/signup.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" maxlength="23" placeholder="Enter your name" name="fname" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" maxlength="11" placeholder="Enter your username" name="username" required>
          </div>
          
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" maxlength="23" placeholder="Enter your password" name="password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" maxlength="23" placeholder="Confirm your password" name="cpassword" required>
          </div>
        </div>
        
        <div class="button11">
            <a href="#"><button type="submit" class="button">Sign Up</button></a>
            <a href="index.php"><button class="button">Cancel</button></a>
        </div>
        <p>Already a DoEasy.com User? <a href="login.php" style="color:dodgerblue">Log In</a>.</p>
      </form>
    </div>
  </div>
</div>
</body>
</html>
