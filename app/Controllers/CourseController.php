<?php

namespace App\Controllers;

use App\Models\Course_model;

use Google\Cloud\Storage\StorageClient;


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
        echo view('Course/Category_Course');
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
            echo view('Course/Course', $data);
        } else {
            echo view('home/HomePage');
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
            $data['data'] = $model->Select_Video_Of_Course();
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

    // public function Create_Bucket()
    // {
    //     putenv("GOOGLE_APPLICATION_CREDENTIALS=workgress.json");

    //     # Your Google Cloud Platform project ID
    //     $projectId = 'workgress';
    //     # Instantiates a client
    //     $this->storage = new StorageClient([
    //         'projectId' => $projectId
    //     ]);

    //     # The name for the new bucket
    //     $bucketName = 'workgress';

    //     # Creates the new bucket
    //     $bucket = $this->storage->createBucket($bucketName);

    //     echo 'Bucket ' . $bucket->name() . ' created.';
    // }
    public function Upload_Course()
    {
        $model = new Course_model();

        $file = $_FILES;
        $storage = new StorageClient();
        $bucket = $storage->bucket('workgress');
        $content = file_get_contents($file['uploadFile']['tmp_name']);
        $file_name = $file['uploadFile']['name'];

        $bucket->upload($content, [
            'name' => $file_name
        ]);

        $filelink = "https://storage.googleapis.com/workgress/" . $file['uploadFile']['name'];
        $model->Upload_Video($file_name, $filelink);
        echo "upload success";
        //return redirect()->to(base_url('test55'));
    }

    public function Upload_Video()
    {

        $model = new Course_model();
        $file = $_FILES;
        $storage = new StorageClient();
        $bucket = $storage->bucket('workgress');

        $content = file_get_contents($file['Unit_Video_File']['tmp_name']);
        $file_name = $file['uploadFile']['name'];

        if ($bucket->upload($content, ['name' => $file_name])) {
            $filelink = "https://storage.googleapis.com/workgress/" . $file['Unit_Video_File']['name'];
            $model->Upload_Video($file_name, $filelink);
            echo "<div class='preview'>upload success</div>";
        } else {
            echo "<div class='preview'>something wrong</div>";
        }

        //return redirect()->to(base_url('test55'));
    }
    /*public function Upload_Test()
    {
        $model = new Course_model();
        $Photo = $this->request->getFile('photo');

        //echo $Photo->getClientName();
        if ($Photo->getSize() > 0) {
            $Photo_Random_Name = $Photo->getRandomName();
            $upload_to = 'public/upload/';

            $image = \Config\Services::image()
                ->withFile($Photo)
                ->fit(626, 626, 'center')
                ->save('./public/upload/' . $Photo_Random_Name);
            echo "success";
        } else {
            echo "fails";
        }
    }*/
    public function Upload_Unit()
    {
        $model = new Course_model();
        $file = $_FILES;
        $storage = new StorageClient();
        $bucket = $storage->bucket('workgress');

        $content = file_get_contents($file['Unit_Video_File']['tmp_name']);
        $Video_Name = $file['Unit_Video_File']['name'];
        $Unit_Name = $this->request->getVar('Unit_Name');
        $User_id = $this->session->get("User_id");
        $Course_id = $this->session->get("Course_id");
        $Unit_Index = $_GET['Unit_Index'];
        if ($bucket->upload($content, ['name' => $Video_Name])) {
            $Video_link = "https://storage.googleapis.com/workgress/" . $Video_Name;
            $model->Upload_Unit($Course_id, $Video_link, $User_id, $Unit_Name, $Unit_Index, $Video_Name);
            echo "<div class='preview'>upload success</div>";
        } else {
            echo "<div class='preview'>something wrong</div>";
        }

        //return redirect()->to(base_url('test55'));
    }
    public function Upload_Picture_Course()
    {
        $model = new Course_model();
        $file = $_FILES;

        $storage = new StorageClient();
        $bucket = $storage->bucket('workgress');

        $Course_id = $this->session->get("Course_id");

        $content = file_get_contents($file['photo']['tmp_name']);
        $Photo_Name = $file['photo']['name'];
        //echo $Photo->getClientName();
        if ($bucket->upload($content, ['name' => $Photo_Name])) {
            $Photo_link = "https://storage.googleapis.com/workgress/" . $Photo_Name;
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
        $bucket = $storage->bucket('workgress');

        $Course_id = $this->session->get("Course_id");
        $content = file_get_contents($file['photo']['tmp_name']);
        $Photo_Name = $file['photo']['name'];
        //echo $Photo->getClientName();
        if ($bucket->upload($content, ['name' => $Photo_Name])) {
            $Photo_link = "https://storage.googleapis.com/workgress/" . $Photo_Name;
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
            if ($Course_Price != null) {
                $model->Update_Course_Price($Course_id, $Course_Price);
                $msg = '&nbsp&nbsp&nbsp&nbsp&nbspสร้างคอร์สของคุณเรียบร้อยแล้ว อาจจะใช้เวลาสัก 15-30 นาที คอร์สของคุณถึงจะใช้งานได้ &nbsp&nbsp&nbsp&nbsp&nbsp';
                return redirect()->to(base_url('course'))->with('correct', $msg);
            } else {
                echo view('Home/HomePage');
            }
        } else {
            echo view('Home/HomePage');
        }

        //echo $Course_Price." ".$Course_id;
    }
    public function Edit_Price()
    {
        $model = new Course_model();
        $Course_Price = $this->request->getVar('Course_Price');
        $Course_id = $this->session->get("Course_id");

        if ($Course_id) {
            if ($Course_Price != null) {
                $model->Edit_Course_Price($Course_id, $Course_Price);
                $msg = '&nbsp&nbsp&nbsp&nbsp&nbspสร้างคอร์สของคุณเรียบร้อยแล้ว อาจจะใช้เวลาสัก 15-30 นาที คอร์สของคุณถึงจะใช้งานได้ &nbsp&nbsp&nbsp&nbsp&nbsp';
                return redirect()->to(base_url('course'))->with('correct', $msg);
            } else {
                echo view('Home/HomePage');
            }
        } else {
            echo view('Home/HomePage');
        }

        //echo $Course_Price." ".$Course_id;
    }
    public function Upload_Edit_Unit()
    {
        $model = new Course_model();

        $file = $_FILES;
        $storage = new StorageClient();
        $bucket = $storage->bucket('workgress');

        $content = file_get_contents($file['Unit_Video_File']['tmp_name']);

        $Video_Name = $file['Unit_Video_File']['name'];
        $Unit_Name = $this->request->getVar('Unit_Name');
        $Course_id = $this->session->get("Course_id");
        $Unit_Index = $_GET['Unit_Index'];

        //$model->Upload_Edit_Unit($Course_id, $Unit_Index, $Unit_Name);
        if ($bucket->upload($content, ['name' => $Video_Name])) {
            $Video_link = "https://storage.googleapis.com/workgress/" . $Video_Name;
            $model->Upload_Edit_Unit($Course_id, $Video_link, $Unit_Name, $Unit_Index, $Video_Name);
            echo "<div class='preview'>upload success</div>";
        } else {
            echo "<div class='preview'>something wrong</div>";
        }

        //return redirect()->to(base_url('test55'));
    }
}
