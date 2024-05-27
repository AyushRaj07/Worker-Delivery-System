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
$email = $_POST['email'];
$feed = $_POST['feed'];

$sql="INSERT INTO `feedback`.`feedback` (`fname`, `email`, `feed`, `dt`) VALUES ('$fname', '$email', '$feed', current_timestamp());";

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
    <meta charset="utf-8">
    <title>Rating Form</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
  <body>
      <section></section>
    <div class="container">
        <form action="/Web Development Project/review.php" method="POST">
            <h1>Give Your Feedback</h1>
            <div class="id">
                <i class="far fa-user"></i>
                <input type="text" placeholder="Full Name" name="fname" required>
            </div>
            <div class="id">
                <i class="far fa-envelope"></i>
                <input type="email" placeholder="Your Email Address" name="email" required>
            </div>
            <textarea cols="15" rows="5" placeholder="Enter Your Feedback here..." name="feed" required></textarea>
            <button type="submit">Send</button>

        </form>
    </div>
    
  </body>
</html>