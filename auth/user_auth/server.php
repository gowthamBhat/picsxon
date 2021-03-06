<?php
session_start();
if (isset($_SESSION['username'])) {
  header('location: ../../data/user/gallery.php');
}

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
// $con = mysqli_connect('localhost', 'root', '', 'picsxon');
include '../../database/DBconnection.php';

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($con, $_POST['username']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password1 = mysqli_real_escape_string($con, $_POST['password1']);
  $password2 = mysqli_real_escape_string($con, $_POST['password2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password1)) {
    array_push($errors, "Password is required");
  }
  if ($password1 != $password2) {
    array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password1); //encrypt the password before saving in the database

    $query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
    mysqli_query($con, $query);

    $query2 = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results2 = mysqli_query($con, $query2);

    $row = mysqli_fetch_array($results2);
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $username;
    $_SESSION['power'] = 0;
    $_SESSION['status'] = "fresh";

    $_SESSION['success'] = "You are now logged in";
    header('location: ../../data/user/gallery.php');
  }
}

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
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($con, $query);
    if (mysqli_num_rows($results) == 1) {
      $row = mysqli_fetch_array($results);
      $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $username;
      $_SESSION['power'] = $row['power'];
      $_SESSION['status'] = $row['status'];
      $_SESSION['success'] = "You are now logged in";
      header('location: ../../data/user/gallery.php');
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
