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
            $User_JoinCourse =  $model->Select_UserCourse($User_id, $id);
            //echo $User_id;
            $this->User_JoinCourse = [
                'User_JoinCourse' => $User_JoinCourse,
            ];
            $this->session->set($this->User_JoinCourse);
            echo view('Course/CourseViewInfo', $data);
        } else {
            return redirect()->to(base_url('/home'));
        }
    }
    public function User_Register_Course($id = null)
    {
        $model = new CourseUser_model();
        $User_id = $this->session->get("User_id");
        if ($model->Check_Course($id)) {
            $model->Insent_User_Register_Course($User_id, $id);
        } else {
            return redirect()->to(base_url('/home'));
        }
    }
}
