<?php

namespace App\Controllers;

use App\Models\CourseUser_model;

use Google\Cloud\Storage\StorageClient;


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
        $model = new CourseUser_model();
        if ($model->Check_Course($name)) {
            $data['data'] = $model->Select_Coursename($name);
            echo view('Course/CourseName', $data);
        } else {
            return redirect()->to(base_url('/home'));
        }
    }
}
