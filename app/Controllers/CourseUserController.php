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

        if ($model->Check_Course($id)) {
            $data['Courseinfo'] = $model->Select_Courseinfo($id);
            $data['unit'] = $model->Select_unit($id);
            echo view('Course/CourseViewInfo', $data);
        } else {
            return redirect()->to(base_url('/home'));
        }
    }
}
