<?php

namespace App\Models;

use CodeIgniter\Model;

require('adodb5/adodb.inc.php');

class User_model extends Model
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

    public function test()
    {
        $sql = "SELECT * FROM role";
        return $this->connect_postgresdb->execute($sql);
    }
    /* function ตรวจสอบว่า มี email นี้ในระบบหรือยัง */
    public function Check_User_Exist($Email)
    {
        $sql = "SELECT email,user_login_type FROM user_register WHERE email = '$Email' AND user_login_type = 'normal'";
        $CheckEmail = $this->connect_postgresdb->execute($sql);
        if ($CheckEmail->RecordCount() > 0) { //check ว่ามี email ที่รับค่ามาในระบบกี่ email แล้ว ถ้ามากกว่า 0 คือมีเมลนี้ในระบบแล้ว return true
            return true;
        } else { //ถ้ามี 0 คือยังไม่มีอีเมลนี้ในระบบ return false
            return false;
        }
    }
    /**
     * Check_User_Google_Exist
     * function ตรวจสอบว่า มี email google นี้ในระบบหรือยัง
     */
    public function Check_User_Google_Exist($user_email_address)
    {
        $sql = "SELECT email FROM user_register WHERE email = '$user_email_address' AND user_login_type = 'google' ";
        $CheckEmail = $this->connect_postgresdb->execute($sql);
        if ($CheckEmail->RecordCount() > 0) { //check ว่ามี email ที่รับค่ามาในระบบกี่ email แล้ว ถ้ามากกว่า 0 คือมีเมลนี้ในระบบแล้ว return true
            return true;
        } else { //ถ้ามี 0 คือยังไม่มีอีเมลนี้ในระบบ return false
            return false;
        }
    }
    /**
     * Check_User_Facebook_Exist
     * function ตรวจสอบว่า มี email facebook นี้ในระบบหรือยัง
     */
    public function Check_User_Facebook_Exist($user_email_address)
    {
        $sql = "SELECT email FROM user_register WHERE email = '$user_email_address' AND user_login_type = 'facebook' ";
        $CheckEmail = $this->connect_postgresdb->execute($sql);
        if ($CheckEmail->RecordCount() > 0) { //check ว่ามี email ที่รับค่ามาในระบบกี่ email แล้ว ถ้ามากกว่า 0 คือมีเมลนี้ในระบบแล้ว return true
            return true;
        } else { //ถ้ามี 0 คือยังไม่มีอีเมลนี้ในระบบ return false
            return false;
        }
    }
    /* function เพิ่ม คนที่มาสมัคร เข้าไปในระบบ */
    public function Insert_Register($First_Name, $Email, $Password_md5, $hash)
    {
        $sql = "INSERT INTO user_register (first_name, email,password,role_id,activated,email_md5_activated,user_login_type,update_date,create_date) VALUES('$First_Name','$Email','$Password_md5','1','0','$hash','normal',now(),now())";
        $this->connect_postgresdb->execute($sql); //จะทำการ Insert ข้อมูลเข้า ฐานข้อมูล
    }
    public function Insert_Google_Register($user_first_name, $user_last_name, $user_email_address, $user_image)
    {
        //echo $user_first_name;
        $sql = "INSERT INTO user_register (first_name,last_name,email,picture,role_id,activated,user_login_type,update_date,create_date) VALUES('$user_first_name','$user_last_name','$user_email_address','$user_image','1','1','google',now(),now())";
        $this->connect_postgresdb->execute($sql); //จะทำการ Insert ข้อมูลเข้า ฐานข้อมูล
    }
    public function Insert_Facebook_Register($user_name, $user_email_address, $user_image)
    {
        //echo $user_first_name;
        $sql = "INSERT INTO user_register (first_name,email,picture,role_id,activated,user_login_type,update_date,create_date) VALUES('$user_name','$user_email_address','$user_image','1','1','facebook',now(),now())";
        $this->connect_postgresdb->execute($sql); //จะทำการ Insert ข้อมูลเข้า ฐานข้อมูล
    }
    public function Update_User_Google_Login($user_first_name, $user_last_name, $user_email_address, $user_image)
    {
        $sql = "UPDATE user_register SET first_name = '$user_first_name',last_name = '$user_last_name',email = '$user_email_address',picture = '$user_image' , update_date = now() WHERE email = '$user_email_address' AND user_login_type = 'google' ";
        $this->connect_postgresdb->execute($sql); //จะทำการ update ข้อมูล facebook เข้า ฐานข้อมูล
    }
    public function Update_User_Facebook_Login($user_name, $user_email_address, $user_image)
    {
        $sql = "UPDATE user_register SET first_name = '$user_name',email = '$user_email_address',picture = '$user_image' update_date = now() WHERE email = '$user_email_address'  AND user_login_type = 'facebook' ";
        $this->connect_postgresdb->execute($sql); //จะทำการ update ข้อมูล facebook เข้า ฐานข้อมูล
    }
    /* function อัพเดทสถานะคนสมัครจาก อีเมล แก้จาก สถานะ 0 เป็น 1 */
    public function Verify_Register($Email)
    {
        $sql = "UPDATE user_register SET activated = '1' WHERE email = '$Email' AND user_login_type = 'normal' ";
        $this->connect_postgresdb->execute($sql); //จะทำการ update column activated จาก 0 เป็น 1
    }
    /* function จะเลือก รหัสที่แปลงเป็น md5  จากฐานข้อมูลมา*/
    public function Select_Hash($GetEmail)
    {
        $sql = "SELECT email_md5_activated from user_register WHERE email = '$GetEmail' AND user_login_type = 'normal' ";
        return $this->connect_postgresdb->execute($sql);
        //แล้ว return ค่าของรหัสที่แปลงเป็น md5 กลับไป
    }
    /* function ตรวจสอบว่า มี email นี้ในระบบหรือยัง */
    public function Check_Email_Login($Email_Login)
    {
        $sql = "SELECT email FROM user_register WHERE email = '$Email_Login' AND user_login_type = 'normal' ";
        $CheckEmail = $this->connect_postgresdb->execute($sql);
        if ($CheckEmail->RecordCount() == 0) { //check ว่ามี email ที่รับค่ามาในระบบกี่ email แล้ว ถ้ามากกว่า 0 คือมีเมลนี้ในระบบแล้ว return true
            return true;
        } else { //ถ้ามี 0 คือยังไม่มีอีเมลนี้ในระบบ return false
            return false;
        }
    }
    /**
     * Update_To_Teacher
     *
     * @param  mixed $Email
     * @param  mixed $Type
     * 
     * Update ข้อมูลจาก นักเรียน เป็น คุณครู
     * 
     */
    public function Update_To_Teacher($Email, $Type)
    {
        $sql = "UPDATE user_register SET role_id = '2' , update_date = now() WHERE email = '$Email' AND user_login_type = '$Type' ";
        $this->connect_postgresdb->execute($sql);
        return true;
    }
    /**
     * Select_Role
     *
     * @param  mixed $Email
     * @param  mixed $Type
     *
     * เป็นการ select role ทั้งหมดจากฐานข้อมูล
     */
    public function Select_Role($Email, $Type)
    {
        $sql = "SELECT role.role_name FROM user_register JOIN role on user_register.role_id = role.role_id  WHERE user_register.email = '$Email' AND user_login_type = '$Type'";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Update_Profile
     *
     * @param  mixed $Email
     * @param  mixed $Full_name
     * Update ข้อมูลจากหน้า Profile
     * 
     */
    public function Update_Profile($Email, $Full_name)
    {
        $sql = "UPDATE user_register SET first_name = '$Full_name' , update_date = now() WHERE email = '$Email' AND user_login_type = 'normal' ";
        $this->connect_postgresdb->execute($sql);
        return true;
    }
    /**
     * Update_Picture_User
     *
     * @param  mixed $Email
     * @param  mixed $Type
     * @param  mixed $Photo_Type
     * Update รูปภาพจากหน้า Profile 
     */
    public function Update_Picture_User($Email, $Type, $Photo_Type)
    {
        $sql = "UPDATE user_register SET picture = '$Photo_Type' , update_date = now() WHERE email = '$Email' AND user_login_type = '$Type' ";
        $this->connect_postgresdb->execute($sql);
        return true;
    }
    /**
     * Select_AllData
     *
     * @param  mixed $Email
     *
     * Select ข้อมูลทั้งหมดที่อยู่ในระบบ Database 
     * 
     */
    public function Select_AllData($Email)
    {
        $sql = "SELECT * FROM user_register  WHERE email = '$Email' AND user_login_type = 'normal' ";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Updata_Password
     *
     * @param  mixed $Email
     * @param  mixed $Password_New
     *
     * Update Password ของ User 
     */
    public function Updata_Password($Email, $Password_New)
    {
        $sql = "UPDATE user_register SET password = '$Password_New' , update_date = now() WHERE email = '$Email' AND user_login_type = 'normal' ";
        $this->connect_postgresdb->execute($sql);
    }
    /**
     * Check_User_Pass_Login
     * เป็น function สำหรับ select ข้อมูลของ user ที่ login เข้ามา
     */
    public function Check_User_Pass_Login($Email_Login)
    {
        $sql = "SELECT user_register.user_id,user_register.first_name,user_register.email,user_register.password,user_register.picture,user_register.activated,role.role_name FROM user_register JOIN role on user_register.role_id = role.role_id  WHERE user_register.email = '$Email_Login' AND user_login_type = 'normal' ";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Check_User_Google_Login
     * เป็น function สำหรับ check ว่า ระบบ เคยมี google email login เข้ามาหรือยัง
     */
    public function Check_User_Google_Login($user_email_address)
    {
        $sql = "SELECT user_register.user_id,user_register.first_name,user_register.last_name,user_register.email,user_register.picture,user_register.activated,role.role_name FROM user_register JOIN role on user_register.role_id = role.role_id  WHERE user_register.email = '$user_email_address' AND user_login_type = 'google' ";
        return $this->connect_postgresdb->execute($sql);
    }

    /**
     * Check_User_Facebook_Login
     * เป็น function สำหรับ check ว่า ระบบ เคยมี facebook email login เข้ามาหรือยัง
     */
    public function Check_User_Facebook_Login($user_email_address)
    {
        $sql = "SELECT user_register.user_id,user_register.first_name,user_register.email,user_register.picture,user_register.activated,role.role_name FROM user_register JOIN role on user_register.role_id = role.role_id  WHERE user_register.email = '$user_email_address' AND user_login_type = 'facebook'";
        return $this->connect_postgresdb->execute($sql);
    }

    /**
     * Delete_User
     * เป็น function สำหรับ ลบ user ออก
     */
    public function Delete_User($Email, $Type)
    {
        $sql = "DELETE FROM user_register WHERE email = '$Email' AND user_login_type = '$Type'";
        return $this->connect_postgresdb->execute($sql);
    }

    /**
     * User_Forget_Password
     * เป็น function สำหรับ อัพเดท รหัสผ่านใหม่ สำหรับผู้ที่ลืม รหัสผ่านเก่า
     */
    public function User_Forget_Password($Email_Forget, $Password_Forget)
    {
        $sql = "UPDATE user_register SET password = '$Password_Forget' WHERE email = '$Email_Forget' AND user_login_type = 'normal' ";
        $this->connect_postgresdb->execute($sql);
    }
}
