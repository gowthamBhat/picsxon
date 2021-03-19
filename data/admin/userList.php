<?php


include '../../database/DBconnection.php';

$query = "SELECT * FROM users";
$res = mysqli_query($con, $query);
if (!$res) {
    echo json_encode("query failed");
}
$number_of_rows  = mysqli_num_rows($res);
if ($number_of_rows == 0) {
    echo json_encode(mysqli_num_rows($res));
} else {

    $json;
    while ($row = mysqli_fetch_array($res)) {
        $json[] = $row;
    }


    echo json_encode($json);
}
