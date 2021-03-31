<?php
$server = 'localhost';
$user1 = "root";
$password1 = "";
$db = 'picsxon';

//$con=mysqli_conncet("$localhost","$user","$password","$db");
$con = new mysqli($server, $user1, $password1, $db);

if ($con->connect_error) {
    echo '<script>alert("Error on Connecting to Database")</script>';
    die("Connection Failed: " . $con->connect_error);
}
