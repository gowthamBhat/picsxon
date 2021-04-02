<?php
$id  = $_GET['id'];
include '../../database/DBconnection.php';
$query = "UPDATE users SET status = 'accepted',power = 1 WHERE id =" . $id;

$res = mysqli_query($con, $query);

if (!$res) {
    echo json_encode("not updated");
} else {
    echo json_encode($id . " updated");
}
