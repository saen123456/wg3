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
        $this->connect_postgresdb->debug = false;
        $this->connect_postgresdb->connect($this->server, $this->user, $this->password, $this->database);
    }

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
        $sql = "INSERT INTO course (category_course_id,course_name, course_description, create_date,status,update_date)VALUES ($category_course_id,'$course_name','$course_description',now() AT TIME ZONE 'Asia/Bangkok','active',now() AT TIME ZONE 'Asia/Bangkok')";
        $this->connect_postgresdb->execute($sql);
        $sql3 = "SELECT max(course_id) FROM course";
        $count_course = $this->connect_postgresdb->getOne($sql3);
        $sql2 = "INSERT INTO user_create_course (user_id,course_id) VALUES ($User_id,$count_course)";
        $this->connect_postgresdb->execute($sql2);
    }
    public function Select_Course($id)
    {
        /* $sql = "SELECT * from course join user_create_course on course.course_id = user_create_course.course_id join user_register on user_register.user_id =  user_create_course.user_id where user_register.user_id = $id ORDER BY user_create_course.course_id";
        return $this->connect_postgresdb->execute($sql);*/
        $sql = "SELECT * FROM user_create_course join course on user_create_course.course_id = course.course_id join user_register on user_create_course.user_id = user_register.user_id where user_register.user_id = $id ORDER BY user_create_course.course_id ";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Select_newcourse($id)
    {
        $sql = "SELECT max(course.course_id) from course join user_create_course on course.course_id = user_create_course.course_id join user_register on user_register.user_id =  user_create_course.user_id where user_register.user_id = $id ";
        return $this->connect_postgresdb->getOne($sql);
    }
    public function Upload_Unit($Course_id, $Video_link, $User_id, $Unit_Name, $Unit_Index, $Video_Name)
    {
        //echo $user_first_name;
        $sql = "INSERT INTO video (video_name,video_link,create_date,update_date) VALUES ('$Video_Name','$Video_link',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok')";
        $this->connect_postgresdb->execute($sql); //จะทำการ Insert ข้อมูลเข้า ฐานข้อมูล

        $sql2 = "INSERT INTO unit (unit_name,create_date,update_date) VALUES ('$Unit_Name',now() AT TIME ZONE 'Asia/Bangkok', now() AT TIME ZONE 'Asia/Bangkok')";
        $this->connect_postgresdb->execute($sql2);

        $sql3 = "SELECT max(video_id) FROM video";
        $Video_Id = $this->connect_postgresdb->getOne($sql3);

        $sql4 = "SELECT max(unit_id) FROM unit";
        $Unit_Id = $this->connect_postgresdb->getOne($sql4);

        $sql5 = "INSERT INTO course_unit (course_id,unit_id,video_id,unit_index) VALUES ('$Course_id','$Unit_Id','$Video_Id','$Unit_Index')";
        $this->connect_postgresdb->execute($sql5);
    }
    public function Upload_Photo_Course($Course_id, $Photo_link)
    {
        $sql = "UPDATE course SET image_course = '$Photo_link' , update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE course_id = '$Course_id'  ";
        $this->connect_postgresdb->execute($sql);
    }
    public function Edit_Photo_Course($Course_id, $Photo_link)
    {
        $sql = "UPDATE course SET image_course = '$Photo_link' , update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE course_id = '$Course_id'  ";
        $this->connect_postgresdb->execute($sql);
    }
    public function Select_Video_Of_Course()
    {
        //$sql = "SELECT * from course join user_create_course on course.course_id = user_create_course.course_id join user_register on user_register.user_id =  user_create_course.user_id where user_register.user_id = $id ORDER BY user_create_course.course_id";
        $sql = "SELECT * from course_unit join video on course_unit.video_id = video.video_id join unit on unit.unit_id = course_unit.unit_id  join course on course.course_id = course_unit.course_id where course_unit.course_id = '77' ORDER BY course_unit.unit_index";
        //$sql = "SELECT video_id,video_name,video_link from video";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Update_Course_Price($Course_id, $Course_Price)
    {
        $sql = "UPDATE course SET course_price = '$Course_Price' , update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE course_id = '$Course_id'  ";
        $this->connect_postgresdb->execute($sql);
    }
    public function Edit_Course_Price($Course_id, $Course_Price)
    {
        $sql = "UPDATE course SET course_price = '$Course_Price' , update_date = now() AT TIME ZONE 'Asia/Bangkok'  WHERE course_id = '$Course_id'  ";
        $this->connect_postgresdb->execute($sql);
    }
    public function Select_Course_Edit($Course_id)
    {
        $sql = "SELECT * from course_unit join video on course_unit.video_id = video.video_id join unit on unit.unit_id = course_unit.unit_id  join course on course.course_id = course_unit.course_id where course_unit.course_id = '$Course_id' ORDER BY course_unit.unit_index";
        //$sql = "SELECT video_id,video_name,video_link from video";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Upload_Edit_Unit($Course_id, $Video_link, $Unit_Index, $Video_Name)
    {
        $sql3 = "SELECT video_id FROM course_unit WHERE course_id = $Course_id AND unit_index = '$Unit_Index'";
        $Video_id = $this->connect_postgresdb->getOne($sql3);

        $sql4 = "UPDATE video SET video_name = '$Video_Name' , video_link = '$Video_link' , update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE video_id = '$Video_id'  ";
        $this->connect_postgresdb->execute($sql4);
    }
    public function Select_Course_HomePage()
    {
        $sql = "SELECT * FROM user_create_course join course on user_create_course.course_id = course.course_id join user_register on user_create_course.user_id = user_register.user_id LIMIT 8";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Select_Course_New_HomePage()
    {
        $sql = "SELECT * FROM user_create_course join course on user_create_course.course_id = course.course_id join user_register on user_create_course.user_id = user_register.user_id ORDER BY user_create_course.course_id DESC LIMIT 4";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Select_Course_Register($User_id)
    {
        $sql = "SELECT * FROM user_register_course join course on user_register_course.course_id = course.course_id join user_register on user_register_course.user_id = user_register.user_id WHERE user_register_course.user_id = '$User_id' ORDER BY user_register_course.course_id DESC LIMIT 4";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Select_CategoryCourse($start, $perpage)
    {
        $sql = "SELECT * FROM user_create_course join course on user_create_course.course_id = course.course_id join user_register on user_create_course.user_id = user_register.user_id ORDER BY user_create_course.course_id DESC LIMIT '$perpage' OFFSET '$start'  ";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Select_Num_CategoryCourse()
    {
        $sql = "SELECT * FROM user_create_course join course on user_create_course.course_id = course.course_id join user_register on user_create_course.user_id = user_register.user_id ";
        $Course_Row =  $this->connect_postgresdb->execute($sql);
        return $Course_Row->RecordCount();
    }
    public function Update_Course_Name($Course_id, $Course_Name)
    {
        $sql = "UPDATE course SET course_name = '$Course_Name' , update_date = now() AT TIME ZONE 'Asia/Bangkok'   WHERE course_id = '$Course_id'  ";
        $this->connect_postgresdb->execute($sql);
    }
    public function Update_Course_Description($Course_id, $Course_Description)
    {
        $sql = "UPDATE course SET course_description = '$Course_Description' , update_date = now() AT TIME ZONE 'Asia/Bangkok'  WHERE course_id = '$Course_id'  ";
        $this->connect_postgresdb->execute($sql);
    }
    public function Update_Unit_Name($Unit_ID, $Unit_Name)
    {

        $sql = "UPDATE unit SET unit_name = '$Unit_Name' , update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE unit_id = '$Unit_ID'  ";
        $this->connect_postgresdb->execute($sql);
    }
    public function change_status($id)
    {
        $sql = " UPDATE course SET status = 'non_active', update_date = now() AT TIME ZONE 'Asia/Bangkok'  WHERE course_id = $id ";
        $this->connect_postgresdb->execute($sql);
    }
    public function Check_Row_Search_Course($Search_Course_Query)
    {
        $sql = "SELECT * FROM user_create_course join course on user_create_course.course_id = course.course_id join user_register on user_create_course.user_id = user_register.user_id  
        where course.course_name LIKE '%$Search_Course_Query%' OR user_register.first_name LIKE '%$Search_Course_Query%' order by user_create_course.course_id DESC";
        $Row_Num =  $this->connect_postgresdb->execute($sql);
        return $Row_Num->RecordCount();
    }
    public function Search_Course($Search_Course_Query)
    {
        $sql = "SELECT * FROM user_create_course join course on user_create_course.course_id = course.course_id join user_register on user_create_course.user_id = user_register.user_id  
        where course.course_name LIKE '%$Search_Course_Query%' OR user_register.first_name LIKE '%$Search_Course_Query%' order by user_create_course.course_id DESC";
        return $this->connect_postgresdb->execute($sql);
    }
}
