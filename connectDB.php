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

function Select_Amphure($connect_postgresdb, $Province_id)
{

    $sql = "SELECT * FROM amphures WHERE province_id = {$_GET['amphure_id']}";
    $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
    return $connect_postgresdb->execute($sql);
}
