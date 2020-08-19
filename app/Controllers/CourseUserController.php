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
    public function CourseName($name = null)
    {
        $name
        $model = new CourseUser_model();
        if ($model->Check_Course($name)) {
            $data['data'] = $model->Select_Coursename($name);

            echo view('Course/CourseViewInfo', $data);
        } else {
            return redirect()->to(base_url('/home'));
        }
    }
}
