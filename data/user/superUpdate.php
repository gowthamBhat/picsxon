<?php
$id  = $_GET['id'];
include '../../database/DBconnection.php';
$query = "UPDATE users SET status = 'pending' WHERE id =" . $id;
//$query = "DELETE FROM users WHERE id=" . $id;
$res = mysqli_query($con, $query);

if (!$res) {
    // echo json_encode("query error");
    echo json_encode("not updated");
} else {
    echo json_encode($id . " updated");
}
