<?php
$id  = $_GET['id'];
include '../../database/DBconnection.php';
$query = "DELETE FROM users WHERE id=" . $id;
$res = mysqli_query($con, $query);

if (!$res) {
    // echo json_encode("query error");
    echo json_encode("user not deleted");
} else {
    echo json_encode($id . " user deleted");
}
