<?php

namespace App\Models;

use CodeIgniter\Model;

require('adodb5/adodb.inc.php');
$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
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
        $this->server = '34.126.123.98'; //ชื่อ server
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
    public function Insert_Quiz($Course_id, $Quiz, $Choice_Answer_1, $Choice_Answer_2, $Choice_Answer_3, $Choice_Answer_4, $Radio_Answer, $Unit_Index)
    {
        $sql = "INSERT INTO quiz_question (quiz_question_name,create_date,update_date) VALUES ('$Quiz',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok')";
        $this->connect_postgresdb->execute($sql); //จะทำการ Insert ข้อมูลเข้า ฐานข้อมูล

        $sql2 = "SELECT max(quiz_question_id) FROM quiz_question";
        $Quiz_Question__Id = $this->connect_postgresdb->getOne($sql2);

        if ($Radio_Answer == "1") {
            $sql3 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_1','1',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql3);
            $sql4 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_2','0',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql4);
            $sql5 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_3','0',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql5);
            $sql6 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_4','0',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql6);
        } else if ($Radio_Answer == "2") {
            $sql3 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_1','0',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql3);
            $sql4 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_2','1',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql4);
            $sql5 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_3','0',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql5);
            $sql6 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_4','0',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql6);
        } else if ($Radio_Answer == "3") {
            $sql3 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_1','0',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql3);
            $sql4 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_2','0',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql4);
            $sql5 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_3','1',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql5);
            $sql6 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_4','0',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql6);
        } else if ($Radio_Answer == "4") {
            $sql3 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_1','0',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql3);
            $sql4 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_2','0',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql4);
            $sql5 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_3','0',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql5);
            $sql6 = "INSERT INTO quiz_answer (quiz_answer_name,quiz_answer_correct,create_date,update_date,quiz_question_id) VALUES ('$Choice_Answer_4','1',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Quiz_Question__Id')";
            $this->connect_postgresdb->execute($sql6);
        }

        $sql7 = "INSERT INTO course_quiz_unit (course_id,quiz_question_id,unit_index) VALUES ('$Course_id','$Quiz_Question__Id','$Unit_Index')";
        $this->connect_postgresdb->execute($sql7);
    }

    public function Update_Quiz($Quiz_Question_id, $Quiz, $Quiz_Answer_id1, $Quiz_Answer_id2, $Quiz_Answer_id3, $Quiz_Answer_id4, $Choice_Answer_1, $Choice_Answer_2, $Choice_Answer_3, $Choice_Answer_4, $Radio_Answer2)
    {

        $sql = "UPDATE quiz_question SET quiz_question_name ='$Quiz', update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id'";
        $this->connect_postgresdb->execute($sql); //จะทำการ Insert ข้อมูลเข้า ฐานข้อมูล


        if ($Radio_Answer2 == "1") {
            $sql3 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_1', quiz_answer_correct = '1' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id1'";
            $this->connect_postgresdb->execute($sql3);
            $sql4 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_2', quiz_answer_correct = '0' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id2'";
            $this->connect_postgresdb->execute($sql4);
            $sql5 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_3', quiz_answer_correct = '0' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id3'";
            $this->connect_postgresdb->execute($sql5);
            $sql6 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_4', quiz_answer_correct = '0' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id4'";
            $this->connect_postgresdb->execute($sql6);
        } else if ($Radio_Answer2 == "2") {
            $sql3 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_1', quiz_answer_correct = '0' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id1'";
            $this->connect_postgresdb->execute($sql3);
            $sql4 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_2', quiz_answer_correct = '1' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id2'";
            $this->connect_postgresdb->execute($sql4);
            $sql5 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_3', quiz_answer_correct = '0' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id3'";
            $this->connect_postgresdb->execute($sql5);
            $sql6 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_4', quiz_answer_correct = '0' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id4'";
            $this->connect_postgresdb->execute($sql6);
        } else if ($Radio_Answer2 == "3") {
            $sql3 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_1', quiz_answer_correct = '0' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id1'";
            $this->connect_postgresdb->execute($sql3);
            $sql4 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_2', quiz_answer_correct = '0' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id2'";
            $this->connect_postgresdb->execute($sql4);
            $sql5 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_3', quiz_answer_correct = '1' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id3'";
            $this->connect_postgresdb->execute($sql5);
            $sql6 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_4', quiz_answer_correct = '0' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id4'";
            $this->connect_postgresdb->execute($sql6);
        } else if ($Radio_Answer2 == "4") {
            $sql3 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_1', quiz_answer_correct = '0' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id1'";
            $this->connect_postgresdb->execute($sql3);
            $sql4 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_2', quiz_answer_correct = '0' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id2'";
            $this->connect_postgresdb->execute($sql4);
            $sql5 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_3', quiz_answer_correct = '0' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id3'";
            $this->connect_postgresdb->execute($sql5);
            $sql6 = "UPDATE quiz_answer SET quiz_answer_name ='$Choice_Answer_4', quiz_answer_correct = '1' ,update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE quiz_question_id = '$Quiz_Question_id' AND quiz_answer_id = '$Quiz_Answer_id4'";
            $this->connect_postgresdb->execute($sql6);
        }
    }


    public function Upload_Unit($Course_id, $Video_link, $User_id, $Unit_Name, $Unit_Index, $Video_Name, $Video_Duration)
    {
        $sql = "INSERT INTO video (video_name,video_time,video_link,create_date,update_date) VALUES ('$Video_Name','$Video_Duration','$Video_link',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok')";
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
        $sql = "SELECT * from course_unit join video on course_unit.video_id = video.video_id join unit on unit.unit_id = course_unit.unit_id  join course on course.course_id = course_unit.course_id where course_unit.course_id = '98' ORDER BY course_unit.unit_index";
        //$sql = "SELECT video_id,video_name,video_link from video";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Select_Question_Of_Course()
    {
        //$sql = "SELECT * from course join user_create_course on course.course_id = user_create_course.course_id join user_register on user_register.user_id =  user_create_course.user_id where user_register.user_id = $id ORDER BY user_create_course.course_id";
        $sql = "SELECT * from course_quiz_unit join quiz_question on course_quiz_unit.quiz_question_id = quiz_question.quiz_question_id where course_quiz_unit.course_id = '98'";
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
    public function Upload_Edit_Unit($Course_id, $Video_link, $Unit_Index, $Video_Name, $Video_Duration)
    {
        $sql3 = "SELECT video_id FROM course_unit WHERE course_id = '$Course_id' AND unit_index = '$Unit_Index'";
        $Video_id = $this->connect_postgresdb->getOne($sql3);

        $sql4 = "UPDATE video SET video_name = '$Video_Name' , video_time = '$Video_Duration' ,video_link = '$Video_link' , update_date = now() AT TIME ZONE 'Asia/Bangkok' WHERE video_id = '$Video_id'  ";
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
    public function Select_Quiz($Course_id)
    {
        $sql = "SELECT * FROM course_quiz_unit join course on course_quiz_unit.course_id = course.course_id join quiz_question on quiz_question.quiz_question_id = course_quiz_unit.quiz_question_id WHERE course_quiz_unit.course_id = '$Course_id' ORDER BY course_quiz_unit.quiz_question_id ASC";
        return $this->connect_postgresdb->execute($sql);
    }
    public function Select_Quiz_Anw($Course_id, $quiz_id)
    {
        $sql = "SELECT quiz_answer.quiz_answer_id,quiz_answer.quiz_question_id,quiz_answer.quiz_answer_name,quiz_question_name  FROM course_quiz_unit join course on course_quiz_unit.course_id = course.course_id join quiz_question on quiz_question.quiz_question_id = course_quiz_unit.quiz_question_id join quiz_answer on quiz_answer.quiz_question_id =  course_quiz_unit.quiz_question_id WHERE course_quiz_unit.course_id = '$Course_id' AND quiz_answer.quiz_question_id = '$quiz_id' ORDER BY quiz_answer.quiz_question_id";
        //$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
        return $this->connect_postgresdb->execute($sql);
    }

    public function Select_Quiz_Video($quiz_id)
    {
        $sql = "SELECT * FROM quiz_answer join quiz_question on quiz_answer.quiz_question_id = quiz_question.quiz_question_id WHERE quiz_answer.quiz_question_id = '$quiz_id' ORDER BY quiz_answer.quiz_question_id";
        //$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
        return $this->connect_postgresdb->execute($sql);
    }

    public function Upload_Document($Course_id, $Documen_link, $Document_Name)
    {
        $sql = "INSERT INTO document (document_link,create_date,update_date,document_name) VALUES ('$Documen_link',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok','$Document_Name')";
        $this->connect_postgresdb->execute($sql); //จะทำการ Insert ข้อมูลเข้า ฐานข้อมูล

        $sql3 = "SELECT max(document_id) FROM document";
        $Document_Id = $this->connect_postgresdb->getOne($sql3);

        $sql5 = "INSERT INTO course_document (course_id,document_id,create_date,update_date) VALUES ('$Course_id','$Document_Id',now() AT TIME ZONE 'Asia/Bangkok',now() AT TIME ZONE 'Asia/Bangkok')";
        $this->connect_postgresdb->execute($sql5);
    }
    public function Edit_Upload_Document($Course_id, $Documen_link, $Document_Name)
    {
        $sql = "SELECT document_id FROM course_document WHERE course_id = '$Course_id'";
        $Document_Id = $this->connect_postgresdb->getOne($sql);

        $sql2 = "UPDATE document SET document_link = '$Documen_link' , update_date = now() AT TIME ZONE 'Asia/Bangkok',document_name = '$Document_Name' WHERE document_id = '$Document_Id'";
        $this->connect_postgresdb->execute($sql2);
    }
    public function Select_Document_Of_Course($Course_id)
    {
        $sql = "SELECT * FROM course_document join document on course_document.document_id = document.document_id WHERE course_document.course_id = '$Course_id'";
        //$ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;
        return $this->connect_postgresdb->execute($sql);
    }
}
