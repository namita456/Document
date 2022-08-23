<?php
$insert = false;
if(isset($_POST['name'])){
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if(!$con){
	die("connection failed".mysqli_connect_error());
}
//echo "Successfully connected to DB";
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$other = $_POST['other'];
$sql = "INSERT INTO `trip`.`tour` (`name`, `email`, `age`, `gender`, `phone`, `dt`, `other`) VALUES ('$name', '$email', '$age', '$gender', '$phone', current_timestamp(), '$other');";
if($con->query($sql) == true){
    echo "Successfullly Inserted";
    $insert = true;
}
else {
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
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="img/bg.jpg" alt="Lucknow">
    <div class="container">
    <h3>Welcome to Lucknow Travel Form</h3>
    <p>Enter Your Details in the Travel/Tour Form</p>
    <?php
    if($insert == true){
    echo "<p class='submitmsg'>Thanks for submitted this form. We are now connect to enjoy Lucknow trip.</p>";
    }
    ?>
    <form action="pra.php" method="post">
    <input type="text" name="name" id="name" placeholder="Enter Your name">
    <input type="text" name="email" id="email" placeholder="Enter Your E-mail">
    <input type="text" name="age" id="age" placeholder="Enter Your age">
    <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
    <input type="text" name="phone" id="gender" placeholder="Enter Your Mobile No.">
    <textarea name="other" id="other" cols="20" rows="10" placeholder="Enter any other information here..."></textarea>
    <button class="btn" >Submit</button>
    
</form>
    
    </div>
</body>
</html>

