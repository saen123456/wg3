<?php

require('./app/Models/adodb5/adodb.inc.php');
$driver = 'postgres'; //ประเภทของระบบฐานข้อมูล
$connect_postgresdb = NewADOConnection($driver);
$server = '34.87.38.159'; //ชื่อ server
$user = 'postgres'; //ชื่อ user
$password = 'saen30042542'; //รหัสผ่านของ server
$database = 'postgres'; //ชื่อ database
$connect_postgresdb->debug = false;
$connect_postgresdb->connect($server, $user, $password, $database);

$sql = "SELECT * FROM amphures WHERE province_id = '2'";
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
$query = $connect_postgresdb->execute($sql);

$json = array();
while ($result = $query->fetchRow()) {
    //print_r($r);
    array_push($json, $result);
}
echo json_encode($json);
