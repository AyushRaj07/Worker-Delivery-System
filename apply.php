<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if (!$con){
    die("Error". mysqli_connect_error());
}

$fname = $_POST['fname'];
$age = $_POST['age'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$state = $_POST['state'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$aadhar = $_POST['aadhar'];
$disability = $_POST['disability'];
$gender = $_POST['gender'];

$sql="INSERT INTO `register`.`register` (`fname`, `age`, `dob`, `phone`, `address`, `state`, `height`, `weight`, `aadhar`, `disability`, `gender`, `dt`) VALUES ('$fname', '$age', '$dob', '$phone', '$address', '$state', '$height', '$weight', '$aadhar', '$disability', '$gender', current_timestamp());";

if($con->query($sql) == true){
  header("location: index.php");
}
else{
    echo "ERROR: $sql <br> $con->error";  
}
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style6.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

  <div class="container">
    <div class="title">Registration Form
        <img src="logo.jpg" width="200px">
    </div>
    <div class="content">
      <form action="/Web Development Project/apply.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="fname" required>
          </div>
          <div class="input-box">
            <span class="details">Age</span>
            <input type="number" placeholder="Enter your Age" name="age" required>
          </div>
          <div class="input-box">
            <span class="details">Date Of Birth</span>
            <input type="date" placeholder="Enter your DOB" name="dob" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" maxlength="10" placeholder="Enter your number" name="phone" required>
          </div>
          <div class="input-box">
            <span class="details">Your Address</span>
            <input type="text" placeholder="Enter your Address" name="address" required>
          </div>
          <div class="input-box">
            <span class="details">Your State</span>
            <input type="text" placeholder="Enter Your State" name="state" required>
          </div>
          <div class="input-box">
            <span class="details">Your Height</span>
            <input type="text" placeholder="Enter your Height" name="height" required>
          </div>
          <div class="input-box">
            <span class="details">Your Weight</span>
            <input type="text" placeholder="Enter Your Weight" name="weight" required>
          </div>
          <div class="input-box">
            <span class="details">Your Aadhar Number</span>
            <input type="text" maxlength="12" placeholder="Enter your 12 digit Aadhar" name="aadhar" required>
          </div>
          <div class="input-box">
            <span class="details">Person With any Disability</span>
            <input type="text" placeholder="Yes or No" name="disability" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="Male">
          <input type="radio" name="gender" id="dot-2" value="Female">
          <input type="radio" name="gender" id="dot-3" value="Others">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Others</span>
            </label>
          </div>
        </div>
        <div class="button11">
            <a href="#"><button type="submit" class="button">Register</button></a>
            <a href="#"><button type="reset" class="button">Reset</button></a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
