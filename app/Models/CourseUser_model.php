<?php

namespace App\Models;

use CodeIgniter\Model;

require('adodb5/adodb.inc.php');

class CourseUser_model extends Model
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
    // public function Select_Video()
    // {
    //     $sql = "SELECT video_id,video_name,video_link from video";
    //     return $this->connect_postgresdb->execute($sql);
    // }
    public function Select_Courseinfo($name)
    {
        $sql = "select course.course_id,course.course_name,course.course_description,course.course_price,course_unit.video_id ,unit.unit_name from
        course join course_unit on course.course_id = course_unit.course_id join unit on course_unit.unit_id = unit.unit_id where course_name ='$name';";
    }
    public function Select_unit($name)
    { 
        $sql = "select course_unit.video_id ,unit.unit_name from
        course join course_unit on course.course_id = course_unit.course_id join unit on course_unit.unit_id = unit.unit_id where course_name ='$name';";
    }
}
