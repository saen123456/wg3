<?php

require("connectDB.php");

$Province_id = $_GET['province_id'];
$query = Select_Amphure($Province_id);

$json = array();
while ($result = mysqli_fetch_assoc($query)) {
    array_push($json, $result);
    //print_r($result);
}
while ($result = $query->fetchRow()) {
    array_push($json, $result);
}
echo json_encode($json);
