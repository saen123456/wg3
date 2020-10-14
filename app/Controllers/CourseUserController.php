<?php

namespace App\Controllers;

use App\Models\CourseUser_model;

class CourseUserController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function User_Register_Course($id = null)
    {
        $User_id = $this->session->get("User_id");
        if (isset($User_id)) {
            $model = new CourseUser_model();
            if ($model->Check_Course($id)) {
                $model->Insent_User_Register_Course($User_id, $id);
                $User_JoinCourse =  $model->Select_UserCourse($User_id, $id);
                $this->User_JoinCourse = [
                    'User_JoinCourse' => $User_JoinCourse,
                ];
                $this->session->set($this->User_JoinCourse);
                return redirect()->to(base_url('courseuser/learn/' . $id));
            } else {
                return redirect()->to(base_url('/home'));
            }
        } else {
            return redirect()->to(base_url('/login'));
        }
    }
    public function User_LearnCourse($id = null)
    {
        if ($this->session->get("Role_name")) {
            $model = new CourseUser_model();
            // $data['data'] = $model->Select_Video();
            // $data['data'] = $model->Select_Video_Of_Course($id);
            $data['video_link'] = $model->Select_Video_Of_Course($id);
            $data['question'] = $model->Select_Question_Of_Course($id);
            $data['have_document'] = $model->Select_Document_Of_Course($id);
            $data['count_playlist'] = $model->Select_Count_Playlist($id);
            //echo $data['count_playlist'];
            $Course_id = $id;
            $this->Data = [
                'Course_id_document' => $Course_id,
            ];
            $this->session->set($this->Data);
            //echo $this->session->get('Course_id_document');
            echo view('Course/Couse_Learn_Video', $data);
        } else {
            return redirect()->to(base_url('/home'));
        }
    }
    public function CourseView($id = null)
    {
        $model = new CourseUser_model();
        $User_id = $this->session->get("User_id");
        if ($model->Check_Course($id)) {
            $data['Courseinfo'] = $model->Select_Courseinfo($id);
            $data['unit'] = $model->Select_unit($id);

            $data['video_link'] = $model->Select_Video_Of_Course($id);
            $data['question'] = $model->Select_Question_Of_Course($id);

            $data['User_Pass_Unit'] = $model->Select_User_Pass_Unit($User_id, $id);
            $data['count_playlist'] = $model->Select_Count_Playlist($id);
            $data['count_student'] = $model->Select_Count_Student($id);
            $data['check_status'] = $model->check_status($id);

            if (isset($User_id)) {
                $User_JoinCourse =  $model->Select_UserCourse($User_id, $id);
                if ($User_JoinCourse == true) {
                    $this->User_JoinCourse = [
                        'User_JoinCourse' => true,
                    ];
                    $this->session->set($this->User_JoinCourse);
                    echo view('Course/CourseViewInfo', $data);
                } else {
                    $this->User_JoinCourse = [
                        'User_JoinCourse' => false,
                    ];
                    $this->session->set($this->User_JoinCourse);
                    echo view('Course/CourseViewInfo', $data);
                }
            } else {
                echo view('Course/CourseViewInfo', $data);
            }
        } else {
            return redirect()->to(base_url('/home'));
        }
    }
    public function CertificateView($id = null)
    {
        $model = new CourseUser_model();
        $User_id = $this->session->get("User_id");
        $Course_id = $id;
        if (isset($User_id)) {
            $model = new CourseUser_model();
            $data['User_Certificate'] = $model->Select_User_Certificate($User_id, $Course_id);
            $data['count_playlist'] = $model->Select_Count_Playlist($Course_id);
            if ($data['count_playlist'] == $data['User_Certificate']) {
                $data['user_detail'] = $model->Select_User_Detail($User_id);
                $data['course_detail'] = $model->Select_Course_Detail($Course_id);
                echo view('Course/Certificate', $data);
            } else {
                //echo "not pass";
                $msg = '&nbsp&nbsp&nbsp&nbsp&nbspคุณต้องเรียนให้ครบหลักสูตรก่อน&nbsp&nbsp&nbsp&nbsp&nbsp';
                return redirect()->to(base_url('/courseuser/learn/' . $Course_id))->with('incorrect', $msg);
            }
            //echo view('Course/Certificate',$data);
        } else {
            return redirect()->to(base_url('/home'));
        }
    }
    public function DocumentView($id = null)
    {
        $model = new CourseUser_model();
        $User_id = $this->session->get("User_id");
        $Course_id = $id;
        //echo "id = " . $Course_id;
        if (isset($User_id)) {
            $data['document'] = $model->Select_Document($Course_id);
            echo view('Course/Document', $data);
        } else {
            return redirect()->to(base_url('/home'));
        }
    }
    public function My_Course()
    {
        if ($this->session->get("Role_name")) {
            $model = new CourseUser_model();
            $User_id = $this->session->get("User_id");
            //$Percent_Pass_Unit = array();
            $data['My_Course'] = $model->Select_My_Courses($User_id);
            $data['Percent_Pass_Unit'] = $model->Select_Percent_Pass_Unit($User_id);


            echo view('login/My_Courses', $data);
        } else {
            return redirect()->to(base_url('/home'));
        }
    }
    public function Select_Quiz_Video()
    {
        $model = new CourseUser_model();
        $quiz_id = $this->request->getVar('quiz_id');
        $data = $model->Select_Quiz_Video($quiz_id);
        $Select_Quiz = array();
        while ($row = $data->fetchRow()) {
            $Select_Quiz[] = $row;
        }
        return json_encode($Select_Quiz);
    }
    public function Select_User_Do_Answer()
    {
        $model = new CourseUser_model();
        $User_id = $this->request->getVar('User_id');
        $Quiz_Question_id = $this->request->getVar('Quiz_Question_id');
        $data = $model->Select_User_Do_Answer($User_id, $Quiz_Question_id);
        $Select_User_Do_Answer = array();
        while ($row = $data->fetchRow()) {
            $Select_User_Do_Answer[] = $row;
        }
        return json_encode($Select_User_Do_Answer);
    }
    public function Check_User_Answer()
    {
        $model = new CourseUser_model();
        $Quiz_Question_id = $this->request->getVar('Quiz_Question_id');
        $data = $model->Select_Quiz_Anwser($Quiz_Question_id);
        $Select_Answer = array();
        while ($row = $data->fetchRow()) {
            $Select_Answer[] = $row;
        }
        return json_encode($Select_Answer);
    }
    public function Insert_User_Answer()
    {
        $model = new CourseUser_model();
        $User_id = $this->request->getVar('User_id');
        $Quiz_Question_id = $this->request->getVar('Quiz_Question_id');
        $Answer = $this->request->getVar('Answer');

        if ($model->Check_User_Anwser($User_id, $Quiz_Question_id) == true) {
            $model->Update_User_Answer($User_id, $Quiz_Question_id, $Answer);
        } else {
            $model->Insert_User_Answer($User_id, $Quiz_Question_id, $Answer);
        }
    }
    public function Check_User_Pass_Unit()
    {
        $model = new CourseUser_model();
        $User_id = $this->request->getVar('User_id');
        $Course_id = $this->request->getVar('Course_id');
        $Unit_Index = $this->request->getVar('Unit_Index');
        $Pass = $this->request->getVar('Pass');
        $Course_Unit = $this->request->getVar('Course_Unit');

        if ($model->Check_User_Pass_Unit($User_id, $Course_id, $Unit_Index) == true) {
            $model->Update_User_Pass_Unit($User_id, $Course_id, $Unit_Index, $Pass);
            //echo "true";
        } else {
            $model->Insert_User_Pass_Unit($User_id, $Course_id, $Unit_Index, $Pass, $Course_Unit);
            //echo "false";
        }
    }
    public function Delete_User_Pass_Unit()
    {
        $model = new CourseUser_model();
        $User_id = $this->request->getVar('User_id');
        $Course_id = $this->request->getVar('Course_id');
        $Unit_Index = $this->request->getVar('Unit_Index');

        if ($model->Check_User_Pass_Unit($User_id, $Course_id, $Unit_Index) == true) {
            $model->Delete_User_Pass_Unit($User_id, $Course_id, $Unit_Index);
            //echo "true";
        } else {
            return redirect()->to(base_url('/courseuser/learn/' . $Course_id));
        }
    }
    public function Already_User_Pass_Unit()
    {
        $model = new CourseUser_model();
        $User_id = $this->request->getVar('User_id');
        $Course_id = $this->request->getVar('Course_id');


        $data = $model->Select_User_Pass_Unit($User_id, $Course_id);

        $Select_User_Pass_Unit = array();
        while ($row = $data->fetchRow()) {
            $Select_User_Pass_Unit[] = $row;
        }
        return json_encode($Select_User_Pass_Unit);
    }
    public function Cancel_Course()
    {
        $Course_id = $this->request->getVar('course_id');
        $User_id = $this->request->getVar('user_id');
        $model = new CourseUser_model();
        $data = $model->Cancel_Course($User_id, $Course_id);
        return $data;
    }
}
