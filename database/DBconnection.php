<?php
$server = 'localhost';
$user = "root";
$password = "";
$db = 'picsxon';

//$con=mysqli_conncet("$localhost","$user","$password","$db");
$con = new mysqli($server, $user, $password, $db);

if ($con->connect_error) {
    echo '<script>alert("Error on Connecting to Database")</script>';
    die("Connection Failed: " . $con->connect_error);
}
