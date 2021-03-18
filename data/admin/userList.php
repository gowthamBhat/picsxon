<?php


include '../../database/DBconnection.php';

$query = "SELECT * FROM users";
$res = mysqli_query($con, $query);
if (!$res) {
    echo json_encode("query failed");
}
$json;
while ($row = mysqli_fetch_array($res)) {
    $json[] = $row;
}


echo json_encode($json);
