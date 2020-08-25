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
    public function CourseView($id = null)
    {
        $model = new CourseUser_model();
        $User_id = $this->session->get("User_id");
        if ($model->Check_Course($id)) {
            $data['Courseinfo'] = $model->Select_Courseinfo($id);
            $data['unit'] = $model->Select_unit($id);
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
            $data['data'] = $model->Select_Video_Of_Course($id);
            echo view('Course/Couse_Learn_Video', $data);
        } else {
            echo view('Home/HomePage');
        }
    }
    public function My_Course()
    {
        if ($this->session->get("Role_name")) {
            $model = new CourseUser_model();
            $User_id = $this->session->get("User_id");
            $data['My_Course'] = $model->Select_My_Courses($User_id);
            echo view('login/My_Courses', $data);
        } else {
            echo view('Home/HomePage');
        }
    }
}
