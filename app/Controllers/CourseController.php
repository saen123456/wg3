<?php

namespace App\Controllers;

use App\Models\Course_model;

use Google\Cloud\Storage\StorageClient;

require_once("james-heinrich/getid3/getid3/getid3.php");


class CourseController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function Category_Course()
    {

        $Course_model = new Course_model();
        $Perpage = 4;
        if (isset($_GET['page'])) {
            $Page = $_GET['page'];
        } else {
            $Page = 1;
        }
        $Start = ($Page - 1) * $Perpage;
        //echo 'page ' . $Page . ' start ' . $Start . ' perpage ' . $Perpage;

        $Total_Num_Row = $Course_model->Select_Num_CategoryCourse();
        //echo $Total_Num_Row;
        $Total_Page = ceil($Total_Num_Row / $Perpage);
        //echo "Total_Num_Row " . $Total_Num_Row . " Total_Page " . $Total_Page;
        $data['data'] = $Course_model->Select_CategoryCourse($Start, $Perpage);
        $data['Total_Page'] = $Total_Page;
        //print_r($data['data']);
        echo view('Course/Category_Course', $data);
    }
    public function Manage_Course()
    {
        if ($this->session->get("Role_name") == 'teacher' || $this->session->get("Role_name") == 'admin') {
            $model = new Course_model();
            $id =  $this->session->get("User_id");
            $data['data'] = $model->Select_Course($id);
            $Has_Course =  $model->Select_newcourse($id);
            $this->Has_Course = [
                'Has_Course' => $Has_Course,
            ];
            $this->session->set($this->Has_Course);
            //print_r($data['data']);
            echo view('Course/Course', $data);
        } else {
            echo view('home/HomePage');
        }
    }
    public function Edit_Quiz()
    {

        if ($this->session->get("Role_name") == 'teacher' || $this->session->get("Role_name") == 'admin') {
            $Course_Id = $_GET['course_id'];
            if (isset($_GET['quiz_id'])) {
                $Quiz_Id = $_GET['quiz_id'];
                echo $Quiz_Id . " and " . $Course_Id;
            } else {
                $msg = '&nbsp&nbsp&nbsp&nbsp&nbspมีบางอย่างผิดพลาด&nbsp&nbsp&nbsp&nbsp&nbsp';
                return redirect()->to(base_url('course/edit/' . $Course_Id))->with('incorrect', $msg);
            }
        } else {
            echo view('login/HomePage');
        }
    }
    public function CreateCourse()
    {
        if ($this->session->get("Role_name") == 'teacher' || $this->session->get("Role_name") == 'admin') {
            echo view('Course/CreateCourse');
        } else {
            echo view('login/HomePage');
        }
    }
    public function CreateCourseStep2($id = null)
    {
        if ($this->session->get("Role_name") == 'teacher' || $this->session->get("Role_name") == 'admin') {
            $course_id =  $id;
            $this->Data = [
                'Course_id' => $course_id,
            ];
            $this->session->set($this->Data);
            echo view('Course/CreateCourseStep2');
        } else {
            echo view('login/HomePage');
        }
    }
    public function EditCourse($id = null)
    {
        if ($this->session->get("Role_name") == 'teacher' || $this->session->get("Role_name") == 'admin') {
            $model = new Course_model();
            $Course_id =  $id;
            $this->Data = [
                'Course_id' => $Course_id,
            ];
            $this->session->set($this->Data);
            $data['data'] = $model->Select_Course_Edit($Course_id);
            $data['Quiz'] = $model->Select_Quiz($Course_id);

            echo view('Course/EditCourse', $data);
            //echo $Course_Id;
        } else {
            echo view('login/HomePage');
        }
    }
    /**** ส่วนของ View ****/
    public function Test()
    {
        if ($this->session->get("Role_name") == 'teacher' || $this->session->get("Role_name") == 'admin') {
            $model = new Course_model();
            // $data['data'] = $model->Select_Video();
            $data['data'] = $model->Select_Video_Google_Drive();
            echo view('Course/TestVideo', $data);
        } else {
            echo view('login/HomePage');
        }
    }
    public function TestPlayer()
    {
        if ($this->session->get("Role_name")) {
            $model = new Course_model();
            // $data['data'] = $model->Select_Video();
            $data['video_link'] = $model->Select_Video_Of_Course();
            $data['question'] = $model->Select_Question_Of_Course();
            echo view('Course/TestPlayer', $data);
        } else {
            echo view('Home/HomePage');
        }
    }
    public function Create_Course()
    {
        $course_name = $this->request->getVar('course_name');
        $category_course_id = $this->request->getVar('category_course_id');
        $course_description = $this->request->getVar('course_description');
        $User_id = $this->session->get("User_id");
        $model_course = new Course_model();
        $model_course->Insert_Course($course_name, $category_course_id, $course_description, $User_id);
        $course_id =  $model_course->Select_newcourse($User_id);
        $this->Data = [
            'Course_id' => $course_id,
        ];
        $this->session->set($this->Data);
        return redirect()->to(base_url('course/manage/config/' . $course_id));
    }

    public function Create_Quiz()
    {

        // $test = "<script>document.write(p1)</script>";
        // $model_course = new Course_model();
        // $model_course->Insert_Test($test);
        $Course_id = $this->request->getVar('Course_id');
        $Quiz = $this->request->getVar('Quiz');
        $Choice_Answer_1 = $this->request->getVar('Choice_Answer_1');
        $Choice_Answer_2 = $this->request->getVar('Choice_Answer_2');
        $Choice_Answer_3 = $this->request->getVar('Choice_Answer_3');
        $Choice_Answer_4 = $this->request->getVar('Choice_Answer_4');
        $Radio_Answer = $this->request->getVar('Radio_Answer');
        $Unit_Index = $this->request->getVar('Unit_Index');


        $model_course = new Course_model();
        $model_course->Insert_Quiz($Course_id, $Quiz, $Choice_Answer_1, $Choice_Answer_2, $Choice_Answer_3, $Choice_Answer_4, $Radio_Answer, $Unit_Index);
        //return redirect()->to(base_url('course/edit/' . $Course_id));
    }
    public function Update_Quiz()
    {

        // $test = "<script>document.write(p1)</script>";
        // $model_course = new Course_model();
        // $model_course->Insert_Test($test);
        $Quiz_Question_id = $this->request->getVar('Quiz_Question_id');
        $Quiz = $this->request->getVar('Quiz');

        $Quiz_Answer_id1 = $this->request->getVar('Quiz_Answer_id1');
        $Quiz_Answer_id2 = $this->request->getVar('Quiz_Answer_id2');
        $Quiz_Answer_id3 = $this->request->getVar('Quiz_Answer_id3');
        $Quiz_Answer_id4 = $this->request->getVar('Quiz_Answer_id4');

        $Choice_Answer_1 = $this->request->getVar('Choice_Answer_1');
        $Choice_Answer_2 = $this->request->getVar('Choice_Answer_2');
        $Choice_Answer_3 = $this->request->getVar('Choice_Answer_3');
        $Choice_Answer_4 = $this->request->getVar('Choice_Answer_4');

        $Radio_Answer2 = $this->request->getVar('Radio_Answer2');

        //echo $Radio_Answer;

        $model_course = new Course_model();
        $model_course->Update_Quiz($Quiz_Question_id, $Quiz, $Quiz_Answer_id1, $Quiz_Answer_id2, $Quiz_Answer_id3, $Quiz_Answer_id4, $Choice_Answer_1, $Choice_Answer_2, $Choice_Answer_3, $Choice_Answer_4, $Radio_Answer2);
        //return redirect()->to(base_url('course/edit/' . $Course_id));
    }
    public function console_log($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
            ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

    public function change_status()
    {
        $course_id = $this->session->get("Course_id");
        if ($this->session->get("Role_name") == 'teacher' || $this->session->get("Role_name") == 'admin') {

            //echo $course_id;
            $model = new Course_model();
            $model->change_status($course_id);
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspเปลี่ยนสถานะเรียบร้อย&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('course/manage/config/' . $course_id))->with('correct', $msg);
        } else {
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspมีบางอย่างผิดพลาด&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('course/manage/config/' . $course_id))->with('incorrect', $msg);
        }
    }

    //function create bucket
    /*public function Create_Bucket()
    {
        putenv("GOOGLE_APPLICATION_CREDENTIALS=workgress2.json");

        # Your Google Cloud Platform project ID
        $projectId = 'supple-alpha-289508';
        # Instantiates a client
        $this->storage = new StorageClient([
            'projectId' => $projectId
        ]);

        # The name for the new bucket
        $bucketName = 'storage-workgress';

        # Creates the new bucket
        $bucket = $this->storage->createBucket($bucketName);

        echo 'Bucket ' . $bucket->name() . ' created.';
    }*/

    public function Upload_Course()
    {
        $model = new Course_model();

        $file = $_FILES;
        $storage = new StorageClient();
        $bucket = $storage->bucket('storage-workgress');
        $content = file_get_contents($file['uploadFile']['tmp_name']);
        $file_name = $file['uploadFile']['name'];

        $bucket->upload($content, [
            'name' => $file_name
        ]);

        $filelink = "https://storage.googleapis.com/storage-workgress/" . $file['uploadFile']['name'];
        $model->Upload_Video($file_name, $filelink);
        echo "upload success";
        //return redirect()->to(base_url('test55'));
    }

    public function Upload_Video()
    {

        $model = new Course_model();
        $file = $_FILES;
        $storage = new StorageClient();
        $bucket = $storage->bucket('storage-workgress');

        $content = file_get_contents($file['Unit_Video_File']['tmp_name']);
        $file_name = $file['uploadFile']['name'];

        if ($bucket->upload($content, ['name' => $file_name])) {
            $filelink = "https://storage.googleapis.com/storage-workgress/" . $file['Unit_Video_File']['name'];
            $model->Upload_Video($file_name, $filelink);
            echo "<div class='preview'>upload success</div>";
        } else {
            echo "<div class='preview'>something wrong</div>";
        }
    }
    // public function Test_Upload()
    // {

    //     $file = $_FILES;
    //     $getId3 = new \getID3();

    //     $Video_TmpName = $file['Unit_Video_File_Test']['tmp_name'];
    //     $Video_Name = $file['Unit_Video_File_Test']['name'];
    //     //$this->calculateFileSize($Video_TmpName);
    //     $Get_Duration = $getId3->analyze($Video_TmpName);
    //     $Video_Duration = $Get_Duration['playtime_string'];
    //     echo $Video_Name . " Duration = " . $Video_Duration;
    // }
    public function Upload_Unit()
    {
        $getId3 = new \getID3();
        $model = new Course_model();
        $file = $_FILES;
        $storage = new StorageClient();
        $bucket = $storage->bucket('storage-workgress');
        $content = file_get_contents($file['Unit_Video_File']['tmp_name']);
        $Video_Name = $file['Unit_Video_File']['name'];

        $Unit_Name = $this->request->getVar('Unit_Name');
        $User_id = $this->session->get("User_id");
        $Course_id = $this->session->get("Course_id");
        $Unit_Index = $_GET['Unit_Index'];

        $Video_TmpName = $file['Unit_Video_File']['tmp_name'];
        $Get_Duration = $getId3->analyze($Video_TmpName);
        $Video_Duration = $Get_Duration['playtime_string'];

        if ($bucket->upload($content, ['name' => $Video_Name])) {
            $Video_link = "https://storage.googleapis.com/storage-workgress/" . $Video_Name;
            $model->Upload_Unit($Course_id, $Video_link, $User_id, $Unit_Name, $Unit_Index, $Video_Name, $Video_Duration);
            echo "<div class='preview'>upload success</div>";
        } else {
            echo "<div class='preview'>something wrong</div>";
        }
    }
    public function Upload_Document()
    {
        $model = new Course_model();
        $file = $_FILES;

        $storage = new StorageClient();
        $bucket = $storage->bucket('storage-workgress');

        $Course_id = $this->session->get("Course_id");

        $content = file_get_contents($file['Document']['tmp_name']);
        $Document_Name = $file['Document']['name'];
        //echo $Photo->getClientName();
        if ($bucket->upload($content, ['name' => $Document_Name])) {
            $Documen_link = "https://storage.googleapis.com/storage-workgress/" . $Document_Name;
            $model->Upload_Document($Course_id, $Documen_link);
            echo "อัพโหลดเนื้อหาเรียบร้อยแล้ว";
        } else {
            echo "อัพโหลดไม่สำเร็จ";
        }
    }
    public function Upload_Picture_Course()
    {
        $model = new Course_model();
        $file = $_FILES;

        $storage = new StorageClient();
        $bucket = $storage->bucket('storage-workgress');

        $Course_id = $this->session->get("Course_id");

        $content = file_get_contents($file['photo']['tmp_name']);
        $Photo_Name = $file['photo']['name'];
        //echo $Photo->getClientName();
        if ($bucket->upload($content, ['name' => $Photo_Name])) {
            $Photo_link = "https://storage.googleapis.com/storage-workgress/" . $Photo_Name;
            $model->Upload_Photo_Course($Course_id, $Photo_link);
            echo "อัพโหลดรูปภาพเรียบร้อยแล้ว";
        } else {
            echo "อัพโหลดไม่สำเร็จ";
        }
    }
    public function Edit_Picture_Course()
    {
        $model = new Course_model();
        $file = $_FILES;

        $storage = new StorageClient();
        $bucket = $storage->bucket('storage-workgress');

        $Course_id = $this->session->get("Course_id");
        $content = file_get_contents($file['photo']['tmp_name']);
        $Photo_Name = $file['photo']['name'];
        //echo $Photo->getClientName();
        if ($bucket->upload($content, ['name' => $Photo_Name])) {
            $Photo_link = "https://storage.googleapis.com/storage-workgress/" . $Photo_Name;
            $model->Edit_Photo_Course($Course_id, $Photo_link);
            echo "อัพโหลดรูปภาพเรียบร้อยแล้ว";
        } else {
            echo "อัพโหลดไม่สำเร็จ";
        }
    }
    public function Update_Price()
    {
        $model = new Course_model();
        $Course_Price = $this->request->getVar('Course_Price');
        $Course_id = $this->session->get("Course_id");

        if ($Course_id) {
            $model->Update_Course_Price($Course_id, $Course_Price);
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspสร้างคอร์สของคุณเรียบร้อยแล้ว อาจจะใช้เวลาสัก 15-30 นาที คอร์สของคุณถึงจะใช้งานได้ &nbsp&nbsp&nbsp&nbsp&nbsp';
            //return redirect()->to(base_url('course'))->with('correct', $msg);
            return redirect()->to(base_url('course/edit/' . $Course_id))->with('correct', $msg);
        } else {
            echo view('Home/HomePage');
        }
    }
    public function Edit_Price()
    {
        $model = new Course_model();
        $Course_Price = $this->request->getVar('Course_Price');
        $Course_id = $this->session->get("Course_id");

        if ($Course_id) {
            $model->Edit_Course_Price($Course_id, $Course_Price);
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspสร้างคอร์สของคุณเรียบร้อยแล้ว อาจจะใช้เวลาสัก 15-30 นาที คอร์สของคุณถึงจะใช้งานได้ &nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('course'))->with('correct', $msg);
        } else {
            echo view('Home/HomePage');
        }

        //echo $Course_Price." ".$Course_id;
    }
    public function Upload_Edit_Unit()
    {
        $getId3 = new \getID3(); //libary for check video time
        $model = new Course_model();

        $file = $_FILES;
        $storage = new StorageClient();
        $bucket = $storage->bucket('storage-workgress');

        $content = file_get_contents($file['Unit_Video_File']['tmp_name']);

        $Video_Name = $file['Unit_Video_File']['name'];
        $Course_id = $this->session->get("Course_id");
        $Unit_Index = $_GET['Unit_Index'];

        $Video_TmpName = $file['Unit_Video_File']['tmp_name'];
        $Get_Duration = $getId3->analyze($Video_TmpName);
        $Video_Duration = $Get_Duration['playtime_string'];
        //$model->Upload_Edit_Unit($Course_id, $Unit_Index, $Unit_Name);
        if ($bucket->upload($content, ['name' => $Video_Name])) {
            $Video_link = "https://storage.googleapis.com/storage-workgress/" . $Video_Name;
            $model->Upload_Edit_Unit($Course_id, $Video_link, $Unit_Index, $Video_Name, $Video_Duration);
            echo "<div class='preview'>upload success</div>";
        } else {
            echo "<div class='preview'>something wrong</div>";
        }

        //return redirect()->to(base_url('test55'));
    }
    public function Edit_Unit_Name()
    {
        $model = new Course_model();
        $Unit_Name = $this->request->getVar('Unit_Name');
        $Unit_ID = $_GET['Unit_ID'];
        $Course_id = $this->session->get("Course_id");
        //echo $Unit_ID . " " . $Unit_Name;
        $model->Update_Unit_Name($Unit_ID, $Unit_Name);
        $msg = '&nbsp&nbsp&nbsp&nbsp&nbspแก้ไขชื่อ unit ของคุณเรียบร้อยแล้ว &nbsp&nbsp&nbsp&nbsp&nbsp';
        return redirect()->to(base_url('course/edit/' . $Course_id))->with('correct', $msg);
    }
    public function Edit_Course_Name()
    {
        $model = new Course_model();

        $Course_Name = $this->request->getVar('course_name');
        $Course_id = $this->session->get("Course_id");
        //echo $Course_Name . " " . $Course_id;
        $model->Update_Course_Name($Course_id, $Course_Name);
        $msg = '&nbsp&nbsp&nbsp&nbsp&nbspแก้ไขชื่อหลักสูตรของคุณเรียบร้อยแล้ว &nbsp&nbsp&nbsp&nbsp&nbsp';
        return redirect()->to(base_url('course/edit/' . $Course_id))->with('correct', $msg);
    }
    public function Edit_Course_Description()
    {
        $model = new Course_model();
        $Course_Description = $this->request->getVar('course_description');
        $Course_id = $this->session->get("Course_id");
        $Course_Description = str_replace("</p><p>", "\n", $Course_Description);
        $Course_Description = str_replace("<p>", "", $Course_Description);
        $Course_Description = str_replace("</p>", "", $Course_Description);
        //echo $Course_Description . " " . $Course_id;
        $model->Update_Course_Description($Course_id, $Course_Description);
        $msg = '&nbsp&nbsp&nbsp&nbsp&nbspแก้ไขคำอธิบายหลักสูตรของคุณเรียบร้อยแล้ว &nbsp&nbsp&nbsp&nbsp&nbsp';
        return redirect()->to(base_url('course/edit/' . $Course_id))->with('correct', $msg);
    }
    public function Search_Course()
    {
        $model = new Course_model();
        $Search_Course_Query = $this->request->getVar('Search_Course_Query');
        //echo $Search_Course_Query;
        $Row_Num_Course = $model->Check_Row_Search_Course($Search_Course_Query);
        //echo $Row_Num_Course;
        if ($Row_Num_Course != 0) {
            $data['data'] = $model->Search_Course($Search_Course_Query);
            echo view('Course/SearchCourse', $data);
        } else {
            $data['msg'] = "ไม่เจอผลลัพธ์ที่ค้นหา";
            echo view('Course/SearchCourse', $data);
        }
    }
    public function Select_Quiz_Modal()
    {
        $model = new Course_model();
        $quiz_id = $this->request->getVar('quiz_id');
        $Course_id = $this->request->getVar('course_id');
        $data = $model->Select_Quiz_Anw($Course_id, $quiz_id);
        $Select_Quiz = array();
        while ($row = $data->fetchRow()) {
            $Select_Quiz[] = $row;
        }
        return json_encode($Select_Quiz);
    }

    public function Select_Quiz_Video()
    {
        $model = new Course_model();
        $quiz_id = $this->request->getVar('quiz_id');
        $data = $model->Select_Quiz_Video($quiz_id);
        $Select_Quiz = array();
        while ($row = $data->fetchRow()) {
            $Select_Quiz[] = $row;
        }
        return json_encode($Select_Quiz);
    }
}
