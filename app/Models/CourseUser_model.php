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
    public function Select_Courseinfo($id)
    {
        $sql = "SELECT course.course_id,course.course_name,course.course_description,course.course_price, CONCAT(user_register.first_name,CONCAT(' ',user_register.last_name)) as full_name , course.update_date , course.image_course from
        course join user_create_course on  course.course_id = user_create_course.course_id  join user_register on user_create_course.user_id = user_register.user_id where  course.course_id ='$id'";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Select_unit($id)
    {
        $sql = "SELECT course_unit.video_id ,unit.unit_name from
        course join course_unit on course.course_id = course_unit.course_id join unit on course_unit.unit_id = unit.unit_id where course.course_id ='$id'";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Check_Course($id)
    {
        $sql = "SELECT course_name FROM course WHERE course_id = '$id' ";
        $course_name = $this->connect_postgresdb->execute($sql);
        if ($course_name->RecordCount() > 0) { //check ว่ามี email ที่รับค่ามาในระบบกี่ email แล้ว ถ้ามากกว่า 0 คือมีเมลนี้ในระบบแล้ว return true
            return true;
        } else { //ถ้ามี 0 คือยังไม่มีอีเมลนี้ในระบบ return false
            return false;
        }
    }
    public function Insent_User_Register_Course($User_id, $Course_id)
    {
        $sql = "INSERT INTO user_register_course(
            user_id, course_id, update_date, create_date)
            VALUES ($User_id,$Course_id,now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok') ";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Select_UserCourse($User_id, $Course_id)
    {
        $sql = "SELECT * FROM user_register_course WHERE course_id = '$Course_id' and user_id = '$User_id'";
        $Count_Row = $this->connect_postgresdb->execute($sql);
        if ($Count_Row->RecordCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function Select_Video_Of_Course($id)
    {
        //$sql = "SELECT * from course join user_create_course on course.course_id = user_create_course.course_id join user_register on user_register.user_id =  user_create_course.user_id where user_register.user_id = $id ORDER BY user_create_course.course_id";
        $sql = "SELECT * from course_unit join video on course_unit.video_id = video.video_id join unit on unit.unit_id = course_unit.unit_id  join course on course.course_id = course_unit.course_id where course_unit.course_id = '$id' ORDER BY course_unit.unit_index";
        //$sql = "SELECT video_id,video_name,video_link from video";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Select_My_Courses($User_id)
    {
        $sql = "SELECT * FROM user_register_course join course on user_register_course.course_id = course.course_id join user_register on user_register_course.user_id = user_register.user_id WHERE user_register_course.user_id = '$User_id' ORDER BY user_register_course.course_id DESC";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Select_Question_Of_Course()
    {
        //$sql = "SELECT * from course join user_create_course on course.course_id = user_create_course.course_id join user_register on user_register.user_id =  user_create_course.user_id where user_register.user_id = $id ORDER BY user_create_course.course_id";
        $sql = "SELECT * from course_quiz_unit join quiz_question on course_quiz_unit.quiz_question_id = quiz_question.quiz_question_id where course_quiz_unit.course_id = '98'";
        //$sql = "SELECT video_id,video_name,video_link from video";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Select_Quiz_Video($quiz_id)
    {
        $sql = "SELECT * FROM quiz_answer join quiz_question on quiz_answer.quiz_question_id = quiz_question.quiz_question_id WHERE quiz_answer.quiz_question_id = '$quiz_id' ORDER BY quiz_answer.quiz_question_id";
        //$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
        return $this->connect_postgresdb->execute($sql);
    }
}
