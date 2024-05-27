<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if (!$con){
    die("Error". mysqli_connect_error());
}

$fname = $_POST['fname'];
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$state = $_POST['state'];
$pincode = $_POST['pincode'];
$landmark = $_POST['landmark'];
$worker = $_POST['worker'];
$specify = $_POST['specify'];

$sql="INSERT INTO `cart`.`cart` (`fname`, `username`, `email`, `phone`, `address`, `state`, `pincode`, `landmark`, `worker`, `specify`, `dt`) VALUES ('$fname', '$username', '$email', '$phone', '$address', '$state', '$pincode', '$landmark', '$worker', '$specify', current_timestamp());";

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="details1.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="working">
        <div class="row2">
            <div class="col22">
                <img src="carpenter.jpg">
                <h4 class="p-name">Carpenter</h4>
                <p class="p-price">₹ 400 (Min. Price)</p>
                <p class="p-detail">DoEasy.com offers carpenters who are well experienced in their work. They will be available with their proper equipments. So What's stopping you. <b>Hire Now!</b></p>
            </div>
            <div class="col1"> 
                <div class="container">
                    <div class="title">My Account 
                        <img src="logo.jpg" width="200px">
                    </div>
                    <div class="content">
                      <form action="/Web Development Project/details8.php" method="POST">
                        <div class="user-details">
                          <div class="input-box">
                            <span class="details">Full Name</span>
                            <input type="text" placeholder="Enter your name" name="fname" required>
                          </div>
                          <div class="input-box">
                            <span class="details">Username</span>
                            <input type="text" placeholder="Enter your Username" name="username" required>
                          </div>
                          <div class="input-box">
                            <span class="details">Your Email</span>
                            <input type="email" placeholder="Enter your Email ID" name="email" required>
                          </div>
                          <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input type="text" maxlength="10" placeholder="Enter your number" name="phone" required>
                          </div>
                          <div class="input-box">
                            <span class="details">Your Full Address</span>
                            <input type="text" placeholder="Enter your Address" name="address" required>
                          </div>
                          <div class="input-box">
                            <span class="details">Your State</span>
                            <input type="text" placeholder="Enter Your State" name="state" required>
                          </div>
                          <div class="input-box">
                            <span class="details">Your Pincode</span>
                            <input type="number" placeholder="Enter your Pincode" name="pincode" required>
                          </div>
                          <div class="input-box">
                            <span class="details">Any Landmark</span>
                            <input type="text" placeholder="Enter Landmark near your location" name="landmark" required>
                          </div>
                          <div class="input-box">
                            <span class="details">Number of Carpenters</span>
                            <input type="number" placeholder="Enter Number of Carpenters" name="worker" required>
                          </div>
                          <div class="input-box">
                            <span class="details">Preferred Specificattion .</span>
                            <input type="text" placeholder="Enter your specifications" name="specify" required>
                          </div>
                        </div>
                        <div class="button11">
                            <a href="#"><button type="submit" class="button">Hire Now</button></a>
                            <a href="#"><button type="reset" class="button">Reset</button></a>
                        </div>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</body>
</html>
