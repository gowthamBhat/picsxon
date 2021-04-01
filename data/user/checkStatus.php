<?php
include '../../database/DBconnection.php';
$id = $_GET['id'];
$query = "SELECT * FROM users WHERE id=" . $id;
$results = mysqli_query($con, $query);
if (mysqli_num_rows($results) == 1) {
    $json;
    $row = mysqli_fetch_array($results);
    $json[] = $row;
    echo json_encode($json);
}
