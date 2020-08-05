<?php

namespace App\Models;

use CodeIgniter\Model;

require('adodb5/adodb.inc.php');

class Course_model extends Model
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
        $this->connect_postgresdb->debug = true;
        $this->connect_postgresdb->connect($this->server, $this->user, $this->password, $this->database);
    }
    // public function Select_Video()
    // {
    //     $sql = "SELECT video_id,video_name,video_link from video";
    //     return $this->connect_postgresdb->execute($sql);
    // }
    public function Select_Video_Google_Drive()
    {
        $sql = "SELECT video_id,video_name,video_link from video";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Upload_Video($filename, $filelink)
    {
        //echo $user_first_name;
        $sql = "INSERT INTO video (video_name,video_link,create_date) VALUES ('$filename','$filelink',now())";
        $this->connect_postgresdb->execute($sql); //จะทำการ Insert ข้อมูลเข้า ฐานข้อมูล
    }
    public function Insert_Course($course_name, $category_course_id, $course_description, $User_id)
    {
        $sql = "INSERT INTO course (category_course_id,course_name, course_description, create_date)VALUES ($category_course_id,'$course_name','$course_description',now())";
        $this->connect_postgresdb->execute($sql);
        $sql3 = "SELECT max(course_id) FROM course";
        $count_course = $this->connect_postgresdb->getOne($sql3);
        $sql2 = "INSERT INTO user_create_course (user_id,course_id) VALUES ($User_id,$count_course)";
        $this->connect_postgresdb->execute($sql2);
    }
    public function Select_Course($id)
    {
        $sql = "SELECT * from course join user_create_course on course.course_id = user_create_course.course_id join user_register on user_register.user_id =  user_create_course.user_id where user_register.user_id = $id ";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Select_newcourse($id)
    {
        $sql = "SELECT max(course.course_id) from course join user_create_course on course.course_id = user_create_course.course_id join user_register on user_register.user_id =  user_create_course.user_id where user_register.user_id = $id ";
        return $this->connect_postgresdb->getOne($sql);
    }
    public function Upload_Unit($Course_id, $Video_link, $User_id, $Unit_Name, $Unit, $Video_Name)
    {
        //echo $user_first_name;
        $sql = "INSERT INTO video (video_name,video_link,create_date) VALUES ('$Video_Name','$Video_link',now())";
        $this->connect_postgresdb->execute($sql); //จะทำการ Insert ข้อมูลเข้า ฐานข้อมูล

        $sql2 = "INSERT INTO unit (unit_name,create_date) VALUES ('$Unit_Name',now())";
        $this->connect_postgresdb->execute($sql2);

        $sql3 = "SELECT max(video_id) FROM video";
        $Video_Id = $this->connect_postgresdb->getOne($sql3);

        $sql4 = "SELECT max(unit_id) FROM unit";
        $Unit_Id = $this->connect_postgresdb->getOne($sql4);

        $sql5 = "INSERT INTO course_unit (course_id,unit_id,video_id,unit_index) VALUES ('$Course_id','$Unit_Id','$Video_Id','$Unit')";
        $this->connect_postgresdb->execute($sql5);
    }
}
