<?php

namespace App\Models;

use CodeIgniter\Model;

require('adodb5/adodb.inc.php');

class Admin_model extends Model
{

    protected $driver;
    protected $connect_postgresdb;
    protected $server;
    protected $user;
    protected $password;
    protected $database;

    public function __construct()
    {
        $this->driver = 'postgres'; //ประเภทของระบบฐานข้อมูล
        $this->connect_postgresdb = NewADOConnection($this->driver);
        $this->server = '34.87.38.159'; //ชื่อ server
        $this->user = 'postgres'; //ชื่อ user
        $this->password = 'saen30042542'; //รหัสผ่านของ server
        $this->database = 'postgres'; //ชื่อ database
        $this->connect_postgresdb->debug = false;
        $this->connect_postgresdb->connect($this->server, $this->user, $this->password, $this->database);
    }
    /**
     * select
     * เป็นการ select สมาชิก ทั้งหมดจาก ฐานข้อมูล
     */
    public function select($id)
    {
        if ($id == null) {
            $sql = "SELECT * FROM user_register";
            return $this->connect_postgresdb->execute($sql);
        } else {
            $sql = "SELECT * FROM user_register where user_id = $id ";
            return $this->connect_postgresdb->execute($sql);
        }
    }
    /**
     * show_user_all
     * เป็นการ select สมาชิก ทั้งหมดจาก ฐานข้อมูล พร้อมกับ join ตาราง role
     */
    public function show_user_all($id)
    {
        if ($id == null) {
            $sql = "SELECT user_register.user_id,user_register.first_name,user_register.last_name,user_register.email,user_register.picture,user_register.activated,role.role_name,user_register.user_login_type,user_register.create_date,user_register.update_date FROM user_register JOIN role on user_register.role_id = role.role_id  order by user_id";
            return $this->connect_postgresdb->execute($sql);
        } else {
            $sql = "SELECT * FROM user_register where user_id = $id ";
            return $this->connect_postgresdb->execute($sql);
        }
    }
    /**
     * show_user_normal
     * เป็นการ select สมาชิก ทั้งหมดจาก ฐานข้อมูล ที่มีสถานะ = normal
     */
    public function show_user_normal($id)
    {
        if ($id == null) {
            $sql = "SELECT user_register.user_id,user_register.first_name,user_register.last_name,user_register.email,user_register.picture,user_register.activated,role.role_name,user_register.user_login_type,user_register.create_date,user_register.update_date FROM user_register JOIN role on user_register.role_id = role.role_id where user_login_type = 'normal' order by user_id";
            return $this->connect_postgresdb->execute($sql);
        } else {
            $sql = "SELECT * FROM user where user_id = $id ";
            return $this->connect_postgresdb->execute($sql);
        }
    }
    /**
     * show_user_google
     * เป็นการ select สมาชิก ทั้งหมดจาก ฐานข้อมูล ที่มีสถานะ = google
     */
    public function show_user_google($id)
    {
        if ($id == null) {
            $sql = "SELECT user_register.user_id,user_register.first_name,user_register.last_name,user_register.email,user_register.picture,user_register.activated,role.role_name,user_register.user_login_type FROM user_register JOIN role on user_register.role_id = role.role_id where user_login_type = 'google' order by user_id";
            return $this->connect_postgresdb->execute($sql);
        } else {
            $sql = "SELECT * FROM user where user_id = $id ";
            return $this->connect_postgresdb->execute($sql);
        }
    }
    /**
     * show_user_facebook
     * เป็นการ select สมาชิก ทั้งหมดจาก ฐานข้อมูล ที่มีสถานะ = facebook
     */
    public function show_user_facebook($id)
    {
        if ($id == null) {
            $sql = "SELECT user_register.user_id,user_register.first_name,user_register.last_name,user_register.email,user_register.picture,user_register.activated,role.role_name,user_register.user_login_type FROM user_register JOIN role on user_register.role_id = role.role_id where user_login_type = 'facebook' order by user_id";
            return $this->connect_postgresdb->execute($sql);
        } else {
            $sql = "SELECT * FROM user where user_id = $id ";
            return $this->connect_postgresdb->execute($sql);
        }
    }
    /**
     * insert_ja
     * เป็นการ เพิ่ม ข้อมูลสมาชิก
     */
    public function insert_ja($first_name, $email, $password, $role_id)
    {

        $sql = "INSERT INTO user_register (first_name, email, password, role_id , activated,user_login_type,update_date,create_date) VALUES('$first_name','$email','$password','$role_id','1','normal',now(),now())";
        $this->connect_postgresdb->execute($sql);
    }
    /**
     * update_ja
     * เป็นการ แก้ไข ข้อมูลสมาชิก
     */
    public function update_ja($user_id, $first_name, $role_id)
    {
        $sql = " UPDATE user_register SET first_name = '$first_name' , role_id =  '$role_id' , update_date = now() WHERE user_id = $user_id ";
        $this->connect_postgresdb->execute($sql);
    }
    /**
     * delete_ja
     * เป็นการ ลบ ข้อมูลสมาชิก
     */
    public function delete_ja($user_id)
    {
        $sql = " DELETE FROM user_register WHERE user_id = $user_id ";
        $this->connect_postgresdb->execute($sql);
    }
    /**
     * Check_User_Exist
     * เป็นการ check ว่ามี email นี้ในระบบหรือไม่
     */
    public function Check_User_Exist($Email)
    {
        $sql = "SELECT email FROM user_register WHERE email = '$Email'";
        $CheckEmail = $this->connect_postgresdb->execute($sql);
        if ($CheckEmail->RecordCount() > 0) { //check ว่ามี email ที่รับค่ามาในระบบกี่ email แล้ว ถ้ามากกว่า 0 คือมีเมลนี้ในระบบแล้ว return true
            return true;
        } else { //ถ้ามี 0 คือยังไม่มีอีเมลนี้ในระบบ return false
            return false;
        }
    }
    /**
     * Search
     * เป็นการ select โดย select จากค่าที่ส่งมา
     */
    public function Search($search_query)
    {
        $sql = "SELECT user_register.user_id,user_register.first_name,user_register.last_name,user_register.email,user_register.picture,user_register.activated,role.role_name,user_register.user_login_type FROM user_register JOIN role on user_register.role_id = role.role_id  where user_register.first_name LIKE '%$search_query%' OR user_register.user_login_type LIKE '%$search_query%' order by user_id";
        return $this->connect_postgresdb->execute($sql);
    }
}
