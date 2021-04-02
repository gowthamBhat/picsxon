<?php
session_start();



// initializing variables
$username = "";
$email    = "";
$errors = array();

// $redirect =  $_GET['redirect'];
// echo $redirect;

// connect to the database
// $con = mysqli_connect('localhost', 'root', '', 'picsxon');
include '../../database/DBconnection.php';


// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $results = mysqli_query($con, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['admin'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: ../../data/admin/adminDashboard.php');
      //header("location: ../../data/admin/$redirect");
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
