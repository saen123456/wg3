<?php

require("connectDB.php");
$Province_id = $_GET['province_id'];
$sql = "SELECT * FROM amphures WHERE province_id = {$_GET['province_id']}";
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
$query = $connect_postgresdb->execute($sql);

$json = array();
while ($result = $query->fetchRow()) {
    //print_r($r);
    array_push($json, $result);
}
echo json_encode($json);
