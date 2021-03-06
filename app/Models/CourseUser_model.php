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
        $this->server = '35.240.212.12'; //ชื่อ server
        $this->user = 'postgres'; //ชื่อ user
        $this->password = 'saen30042542'; //รหัสผ่านของ server
        $this->database = 'postgres'; //ชื่อ database
        $this->connect_postgresdb->debug = false;
        $this->connect_postgresdb->connect($this->server, $this->user, $this->password, $this->database);
    }

    // public function __construct()
    // {
    //     $this->driver = 'postgres'; //ประเภทของระบบฐานข้อมูล
    //     $this->connect_postgresdb = NewADOConnection($this->driver);
    //     $this->server = 'localhost'; //ชื่อ server
    //     $this->user = 'postgres'; //ชื่อ user
    //     $this->password = '12345678'; //รหัสผ่านของ server
    //     $this->database = 'postgres'; //ชื่อ database
    //     $this->connect_postgresdb->debug = false;
    //     $this->connect_postgresdb->connect($this->server, $this->user, $this->password, $this->database);
    // }

    /**
     * check_status
     * เป็น function สำหรับ การ check status ของ course
     */
    public function check_status($id)
    {
        $sql = " SELECT status FROM course  WHERE course_id = '$id' ";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Select_Courseinfo
     * เป็น function สำหรับ การดึงค่ารายละเอียดของหลักสูตรมาแสดง
     */
    public function Select_Courseinfo($id)
    {
        $sql = "SELECT course.course_id,course.course_name,course.course_description,course.course_price, CONCAT(user_register.first_name,CONCAT(' ',user_register.last_name)) as full_name , course.update_date , course.image_course from
        course join user_create_course on  course.course_id = user_create_course.course_id  join user_register on user_create_course.user_id = user_register.user_id where  course.course_id ='$id'";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Select_unit
     * เป็น function สำหรับ การดึงค่าข้อมูลของ unit จาก หลักสูตร
     */
    public function Select_unit($id)
    {
        $sql = "SELECT course_unit.video_id ,unit.unit_name from
        course join course_unit on course.course_id = course_unit.course_id join unit on course_unit.unit_id = unit.unit_id where course.course_id ='$id' ORDER BY course_unit.unit_index";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Check_Course
     * เป็น function สำหรับ การ check ว่าชื่อคอร์สนี้มีหรือยัง ถ้ามี return true ถ้าไม่มี return false
     */
    public function Check_Course($id)
    {
        $sql = "SELECT course_name FROM course WHERE course_id = '$id' ";
        $course_name = $this->connect_postgresdb->execute($sql);
        if ($course_name->RecordCount() > 0) { //ถ้ามากกว่า 0 return true
            return true;
        } else { //ถ้ามี 0 คือยังไม่มีอีเมลนี้ในระบบ return false
            return false;
        }
    }
    /**
     * Insent_User_Register_Course
     * เป็น function สำหรับ การเพิ่มว่าผู้ใช้ได้ทำการลงทะเบียนหลักสูตร
     */
    public function Insent_User_Register_Course($User_id, $Course_id)
    {
        $sql = "INSERT INTO user_register_course(
            user_id, course_id, update_date, create_date)
            VALUES ($User_id,$Course_id,now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok') ";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Select_UserCourse
     * เป็น function สำหรับ การดึงค่าที่ผู้ใช้ลงทะเบียนหลักสูตรอะไรไปบ้าง
     */
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
    /**
     * Select_Video_Of_Course
     * เป็น function สำหรับ การดึงข้อมูล วิดีโอ,ชื่อunit 
     */
    public function Select_Video_Of_Course($id)
    {
        $sql = "SELECT * from course_unit join video on course_unit.video_id = video.video_id join unit on unit.unit_id = course_unit.unit_id  join course on course.course_id = course_unit.course_id where course_unit.course_id = '$id' ORDER BY course_unit.unit_index";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Select_My_Courses
     * เป็น function สำหรับ การดึงข้อมูลหลักสูตรที่ผู้ใช้ทำการลงทะเบียน
     */
    public function Select_My_Courses($User_id)
    {
        $sql = "SELECT * FROM user_register_course join course on user_register_course.course_id = course.course_id join user_register on user_register_course.user_id = user_register.user_id WHERE user_register_course.user_id = '$User_id' ORDER BY user_register_course.course_id DESC";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Select_Percent_Pass_Unit
     * เป็น function สำหรับ การดึงข้อมูลว่าผู้ใช้เรียนไปกี่ % แล้ว
     */
    public function Select_Percent_Pass_Unit($User_id)
    {
        $sql = "SELECT * FROM user_pass_unit WHERE user_id = '$User_id'";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Select_User_Course_Learn($User_id)
    {
        $sql = "SELECT * FROM user_register_course join course on user_register_course.course_id = course.course_id join user_register on user_register_course.user_id = user_register.user_id WHERE user_register_course.user_id = '$User_id' ORDER BY user_register_course.course_id DESC LIMIT 2";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Select_Question_Of_Course
     * เป็น function สำหรับ การดึงคำถามของหลักสูตร
     */
    public function Select_Question_Of_Course($id)
    {
        $sql = "SELECT * from course_quiz_unit join quiz_question on course_quiz_unit.quiz_question_id = quiz_question.quiz_question_id where course_quiz_unit.course_id = '$id' ORDER BY quiz_question.quiz_question_id";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Select_Quiz_Video
     * เป็น function สำหรับ การดึงคำตอบของหลักสูตร
     */
    public function Select_Quiz_Video($quiz_id)
    {
        $sql = "SELECT * FROM quiz_answer join quiz_question on quiz_answer.quiz_question_id = quiz_question.quiz_question_id WHERE quiz_answer.quiz_question_id = '$quiz_id' ORDER BY quiz_answer.quiz_question_id";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Select_Quiz_Anwser
     * เป็น function สำหรับ การดึงว่าคำตอบของคำถามมาแสดง
     */
    public function Select_Quiz_Anwser($Quiz_Question_id)
    {
        $sql = "SELECT *  FROM quiz_answer join quiz_question on quiz_answer.quiz_question_id =  quiz_question.quiz_question_id WHERE quiz_answer.quiz_question_id = '$Quiz_Question_id' ORDER BY quiz_answer.quiz_question_id";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Select_User_Do_Answer
     * เป็น function สำหรับ การดึงว่าผูู้เรียนทำคำถามไปหรือยัง
     */
    public function Select_User_Do_Answer($User_id, $Quiz_Question_id)
    {
        $sql = "SELECT * FROM user_answer WHERE user_id = '$User_id' AND quiz_question_id = '$Quiz_Question_id'";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Check_User_Anwser
     * เป็น function สำหรับ การ check ว่าผู้เรียนทำคำถามนี้ไปหรือยัง return ค่าเป็น true false
     */
    public function Check_User_Anwser($User_id, $Quiz_Question_id)
    {
        $sql = "SELECT * FROM user_answer WHERE user_id = '$User_id' AND quiz_question_id = '$Quiz_Question_id'";
        $Check_User_Ans = $this->connect_postgresdb->execute($sql);
        if ($Check_User_Ans->RecordCount() > 0) { //
            return true;
        } else { //ถ้ามี 0 คือยังไม่มีอีเมลนี้ในระบบ return false
            return false;
        }
    }
    /**
     * Insert_User_Answer
     * เป็น function สำหรับ การเพิ่มว่าผู้เรียนทำคำถามนี้ไปแล้ว
     */
    public function Insert_User_Answer($User_id, $Quiz_Question_id, $Answer)
    {
        $sql = "INSERT INTO user_answer(user_id, quiz_question_id, answer,create_date) VALUES ($User_id,$Quiz_Question_id,$Answer,now() AT TIME ZONE 'Asia/Bangkok') ";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Update_User_Answer
     * เป็น function สำหรับ การแก้ไขว่าผู้เรียนทำคำถามนี้ไปแล้ว
     */
    public function Update_User_Answer($User_id, $Quiz_Question_id, $Answer)
    {
        $sql = "UPDATE user_answer SET answer = '$Answer',update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE user_id = '$User_id' AND quiz_question_id = '$Quiz_Question_id' ";
        $this->connect_postgresdb->getOne($sql); //จะทำการ update ข้อมูล facebook เข้า ฐานข้อมูล
    }
    /**
     * Check_User_Pass_Unit
     * เป็น function สำหรับ การ check ว่าผู้เรียนผ่านเนื้อหานี้ไปหรือยัง
     */
    public function Check_User_Pass_Unit($User_id, $Course_id, $Unit_Index)
    {
        $sql = "SELECT * FROM user_pass_unit WHERE user_id = '$User_id' AND course_id = '$Course_id' AND Unit_Index = '$Unit_Index'";
        $Check_User_Pass_Unit = $this->connect_postgresdb->execute($sql);
        if ($Check_User_Pass_Unit->RecordCount() > 0) { //check ว่ามี email ที่รับค่ามาในระบบกี่ email แล้ว ถ้ามากกว่า 0 คือมีเมลนี้ในระบบแล้ว return true
            return true;
        } else { //ถ้ามี 0 คือยังไม่มีอีเมลนี้ในระบบ return false
            return false;
        }
    }
    /**
     * Insert_User_Pass_Unit
     * เป็น function สำหรับ การ เพิ่มว่าผู้ใช้ผ่านเนื้อหาการเรียนนี้ไปแล้ว
     */
    public function Insert_User_Pass_Unit($User_id, $Course_id, $Unit_Index, $Pass, $Course_Unit)
    {
        $sql = "INSERT INTO user_pass_unit(user_id, course_id, unit_index,pass,course_unit) VALUES ($User_id,$Course_id,$Unit_Index,$Pass, $Course_Unit) ";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Update_User_Pass_Unit
     * เป็น function สำหรับ การ แก้ไขว่าผู้ใช้ผ่านเนื้อหาการเรียนนี้ไปแล้ว
     */
    public function Update_User_Pass_Unit($User_id, $Course_id, $Unit_Index, $Pass)
    {
        $sql = "UPDATE user_pass_unit SET pass = '$Pass' WHERE user_id = '$User_id' AND course_id = '$Course_id' AND unit_index = '$Unit_Index'";
        $this->connect_postgresdb->execute($sql); //จะทำการ update ข้อมูล facebook เข้า ฐานข้อมูล
    }
    /**
     * Delete_User_Pass_Unit
     * เป็น function สำหรับ การ ลบว่าผู้ใช้ผ่านเนื้อหาการเรียนนี้ไปแล้ว
     */
    public function Delete_User_Pass_Unit($User_id, $Course_id, $Unit_Index)
    {
        $sql = "DELETE FROM user_pass_unit WHERE user_id = '$User_id' AND course_id = '$Course_id' AND unit_index = '$Unit_Index'";
        $this->connect_postgresdb->execute($sql); //จะทำการ update ข้อมูล facebook เข้า ฐานข้อมูล
    }
    /**
     * Select_User_Pass_Unit
     * เป็น function สำหรับดึงค่าว่าผู้เรียนผ่านเนื้อหาการเรียนไหนไปแล้วบ้าง
     */
    public function Select_User_Pass_Unit($User_id, $Course_id)
    {
        $sql = "SELECT * FROM user_pass_unit  WHERE user_id = '$User_id' AND course_id = '$Course_id' AND pass='1' ORDER BY unit_index";

        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Select_Document_Of_Course
     * เป็น function สำหรับดึงข้อมุลแหล่งข้อมูลของหลักสูตร
     */
    public function Select_Document_Of_Course($id)
    {
        $sql = "SELECT * FROM course_document join document on course_document.document_id = document.document_id WHERE course_document.course_id = '$id'";
        //$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
        return $this->connect_postgresdb->getOne($sql);
    }
    /**
     * Select_Document
     * เป็น function สำหรับดึงข้อมุลแหล่งข้อมูลของหลักสูตร
     */
    public function Select_Document($Course_id)
    {
        $sql = "SELECT * FROM course_document join document on course_document.document_id = document.document_id WHERE course_document.course_id = '$Course_id'";
        //$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Select_Count_Playlist
     * เป็น function สำหรับดึงว่าหลักสูตรนี้มีเนื้อหาการเรียนกี่ unit
     */
    public function Select_Count_Playlist($id)
    {
        $sql = "SELECT count(unit_index) FROM course_quiz_unit WHERE course_id = '$id'";
        $Count_Quiz = $this->connect_postgresdb->getOne($sql);

        $sql2 = "SELECT count(unit_index) FROM course_unit WHERE course_id = '$id'";
        $Count_Video = $this->connect_postgresdb->getOne($sql2);

        $Count_Playlist = (int) $Count_Quiz + (int) $Count_Video;
        return $Count_Playlist;
    }
    /**
     * Select_Count_Student
     * เป็น function สำหรับดึงว่าหลักสูตรนี้มีผู้เรียนกี่คน
     */
    public function Select_Count_Student($id)
    {
        $sql = "SELECT count(user_id) FROM user_register_course WHERE course_id = '$id'";
        return $this->connect_postgresdb->getOne($sql);
    }
    /**
     * Select_User_Certificate
     * เป็น function สำหรับดึงค่าว่าผู้เรียนเรียนครบเนื้อหาการเรียนหรือยัง
     */
    public function Select_User_Certificate($User_id, $Course_id)
    {
        $sql = "SELECT count(unit_index) FROM user_pass_unit WHERE course_id = '$Course_id' AND user_id = '$User_id'";
        $Count_User_Pass = $this->connect_postgresdb->getOne($sql);
        return $Count_User_Pass;
    }
    /**
     * Select_User_Detail
     * เป็น function สำหรับดึงค่าผู้เรียน
     */
    public function Select_User_Detail($User_id)
    {
        $sql = "SELECT * FROM user_register WHERE user_id = '$User_id'";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Select_Course_Detail
     * เป็น function สำหรับดึงค่ารายละเอียดของหลักสูตร
     */
    public function Select_Course_Detail($Course_id)
    {
        $sql = "SELECT course_name FROM course WHERE course_id = '$Course_id'";
        return $this->connect_postgresdb->execute($sql);
    }
    /**
     * Cancel_Course
     * เป็น function สำหรับลบข้อมุลว่าผู้เรียนสมัครหลักสูตร
     */
    public function Cancel_Course($User_id, $Course_id)
    {
        $sql = "DELETE FROM user_register_course WHERE user_id = '$User_id' AND course_id = '$Course_id'";
        $this->connect_postgresdb->execute($sql);
        $sql2 = "DELETE FROM user_pass_unit WHERE user_id = '$User_id' AND course_id = '$Course_id'";
        $this->connect_postgresdb->execute($sql2);
    }
}
