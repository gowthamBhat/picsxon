<?php
$id  = $_GET['id'];
include '../../database/DBconnection.php';
$query = "DELETE FROM pictures WHERE post_id=" . $id;
$res = mysqli_query($con, $query);

if (!$res) {
    // echo json_encode("query error");
    echo json_encode("picture not deleted");
} else {
    echo json_encode($id . " picture deleted");
}
