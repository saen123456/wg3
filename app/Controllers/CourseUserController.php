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
    public function CourseView($name = null)
    {
        $model = new CourseUser_model();
        if ($model->Check_Course($name)) {

            $data['Course_Info'] = $model->Select_Courseinfo($name);
            $data['Course_New'] = $model->Select_unit($name);

            echo view('Course/CourseViewInfo', $data);
        } else {
            return redirect()->to(base_url('/home'));
        }
    }
}
