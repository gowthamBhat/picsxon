<?php
$id  = $_GET['id'];
include '../../database/DBconnection.php';
$query = "UPDATE users SET status = 'declined' WHERE id =" . $id;

$res = mysqli_query($con, $query);

if (!$res) {
    echo json_encode("not updated");
} else {
    echo json_encode($id . " updated");
}
