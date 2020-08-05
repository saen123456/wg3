<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Admin_model;
use App\Models\User_model;

class AdminController extends BaseController
{
    protected $session;
    function __construct()
    {
        $this->session = \Config\Services::session(); //ประกาศการใช้ session 
        $this->session->start(); //ให้ session เริ่มทำงาน
    }

    /**
     * dashboard
     * function dashboard สำหรับ ดึงข้อมูลของลูกค้าจากฐานข้อมูลแล้วส่งไปให้ที่หน้า dashboard
     * จะมีการ check สถานะของ user ว่าเป็น admin หรือไม่ ถ้าไม่ใช่ให้เด้งกลับไปที่หน้า home
     * ดึงค่า ทั้งหมดของ user จาก function show_user_all จาก model admin
     * แล้วทำการเอาค่่า user ที่ดึงมา ส่งไปที่หน้า dashboard พร้อมกับทำการเก็บ session ไว้ด้วย
     */
    public function dashboard()
    {

        if ($this->session->get("Role_name") == 'admin') {
            $model = new Admin_model();
            $data['data'] = $model->show_user_all(null);
            $this->Data = [
                'Full_name' => $this->session->get("Full_name"),
                'Role_name' => $this->session->get("Role_name"),
                'Picture' => $this->session->get("Picture"), 
            ];
            $this->session->set($this->Data);
            echo view('admin/dashboard', $data);
        } else {
            return redirect()->to(base_url('/home'));
        }
    }

    /**
     * Chart
     * function Chart สำหรับ แสดงหน้า Chart
     * จะมีการ check สถานะของ user ว่าเป็น admin หรือไม่ ถ้าไม่ใช่ให้เด้งกลับไปที่หน้า home
     * 
     */
    public function Chart()
    {

        if ($this->session->get("Role_name") == 'admin') {
            $model = new Admin_model();
            $data['data'] = $model->show_user_normal(null);
            $data['data2'] = $model->show_user_google(null);
            $data['data3'] = $model->show_user_facebook(null);

            echo view('admin/chart', $data);
        } else {
            return redirect()->to(base_url('/home'));
        }
    }
    /**
     * insert
     * function insert สำหรับ แสดงหน้า insert
     * จะมีการ check สถานะของ user ว่าเป็น admin หรือไม่ ถ้าไม่ใช่ให้เด้งกลับไปที่หน้า home
     */
    public function insert()
    {
        if ($this->session->get("Role_name") == 'admin') {
            echo view('admin/add');
        } else {
            return redirect()->to(base_url('/dashboard'));
        }
    }
    /**
     * insert_indatabase
     * จะมีการ check สถานะของ user ว่าเป็น admin หรือไม่ ถ้าไม่ใช่ให้เด้งกลับไปที่หน้า home
     * ดึงค่าต่างๆจากที่ admin ส่งมาเก็บไว้ในตัวแปร
     * แล้วทำการเอาค่่า user ที่ดึงมา ส่งไปที่ function insert_ja แล้วจะทำการเพิ่มสมาชิกเข้าไป
     */
    public function insert_indatabase()
    {
        if ($this->session->get("Role_name") == 'admin') {
            $first_name = $this->request->getVar('first_name');
            $email = $this->request->getVar('email');
            $password = md5($this->request->getVar('password'));
            $role_id  = $this->request->getVar('role_id');
            //echo $first_name." ".$email." ".$password." ".$role_id;
            $model = new Admin_model();
            $model->insert_ja($first_name, $email, $password, $role_id);
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspเพิ่มข้อมูลเรียบร้อย&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('/dashboard'))->with('correct', $msg);
        } else {
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspมีบางอย่างผิดพลาด&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('/dashboard'))->with('incorrect', $msg);
        }
    }
    /**
     * update
     * function update สำหรับ แสดงหน้า update
     * จะมีการ check สถานะของ user ว่าเป็น admin หรือไม่ ถ้าไม่ใช่ให้เด้งกลับไปที่หน้า home
     * มีการดึงค่าจาก id ที่ส่งเข้ามา ไปที่ function select แล้วทำการหา id จากญานข้อมูล
     * แล้วส่งค่าที่ได้ ไปที่หน้า edit 
     */
    public function update($id = null)
    {
        if ($this->session->get("Role_name") == 'admin') {
            $model = new Admin_model();
            $data['data'] = $model->select($id);
            //print_r($data['data']);
            echo view('admin/edit', $data);
        } else {
            return redirect()->to(base_url('/home'));
        }
    }
    /**
     * update_indatabase
     * จะมีการ check สถานะของ user ว่าเป็น admin หรือไม่ ถ้าไม่ใช่ให้เด้งกลับไปที่หน้า home
     * แล้วทำการเอาค่่า user ที่ส่งมา ส่งไปที่ function update_ja แล้วจะทำการแก้ไขตามค่าที่ส่งมากับญานข้อมูล
     * แล้วกลับไปที่หน้า dashboard พร้อมกับ message ว่า อัพเดทเรียบร้อย
     */
    public function update_indatabase()
    {
        if ($this->session->get("Role_name") == 'admin') {
            $user_id = $this->request->getVar('user_id');
            $first_name = $this->request->getVar('first_name');
            $role_id  = $this->request->getVar('role_id');
            //echo  $user_id." ".$first_name." ".$role_id;
            $model = new Admin_model();
            $model->update_ja($user_id, $first_name, $role_id);
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspอัพเดทเรียบร้อย&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('/dashboard'))->with('correct', $msg);
        } else {
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspมีบางอย่างผิดพลาด&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('/dashboard'))->with('incorrect', $msg);
        }
    }
    /**
     * delete_indatabase
     * จะมีการ check สถานะของ user ว่าเป็น admin หรือไม่ ถ้าไม่ใช่ให้เด้งกลับไปที่หน้า home
     * ดึงค่า id ที่ส่งไปที่ function delete_ja แล้งทำการลบจาก ฐานข้อมูล
     * แล้วกลับไปที่หน้า dashboard พร้อมกับ message ว่า ลบเรียบร้อย
     */
    public function delete_indatabase()
    {
        if ($this->session->get("Role_name") == 'admin') {
            $user_id = $_COOKIE['user_id'];
            //echo $user_id;
            $model = new Admin_model();
            $model->delete_ja($user_id);
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspลบเรียบร้อย&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('/dashboard'))->with('correct', $msg);
        } else {
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspมีบางอย่างผิดพลาด&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('/dashboard'))->with('incorrect', $msg);
        }
    }
    /**
     * Check_Email
     * request Email_Register ดึงตัวแปรมาจาก หน้าPageเพื่อใช่งาน
     * เรียก model Admin_model เพื่อใช้งานต่อ database
     * มีการเช็คว่าถ้ามีอีเมลนี้อยู่ในระบบ จะแสดง คำว่า อีเมลนี้ถูกใช้งานไปแล้ว 
     * ถ้าไม่มีอีเมลนี้อยู่ในระบบ จะแสดง คำว่า อีเมลนี้สามารถใช้งานได้ 
     */
    public function Check_Email()
    {
        $Email  = $this->request->getVar('Email');
        $model = new Admin_model();
        if ($model->Check_User_Exist($Email)) {
            echo '<p style="color:#FF0000";> อีเมลนี้ถูกใช้งานไปแล้ว</p>';
        } else {
            echo '<p style="color:#2ecc71";> อีเมลนี้สามารถใช้งานได้</p> ';
        }
    }
    /**
     * Search
     * จะมีการ check สถานะของ user ว่าเป็น admin หรือไม่ ถ้าไม่ใช่ให้เด้งกลับไปที่หน้า home
     * request search_query ดึงตัวแปรมาจาก หน้าPageเพื่อใช้งาน
     * เรียก model Admin_model เพื่อใช้งานต่อ database
     * เรียกใช้ function Search พร้อม่สง ค่า search_query เข้าไป
     * แล้วนำค่าที่ return กลับมา ส่งไปที่หน้า dashboard
     */
    public function Search()
    {
        if ($this->session->get("Role_name") == 'admin') {
            $search_query  = $this->request->getVar('search_query');
            $model = new Admin_model();
            $data['data'] = $model->Search($search_query);
            //print_r($data);
            //return redirect()->to( base_url('/dashboard',$data) );
            $this->Data = [
                'Full_name' => $this->session->get("Full_name"),
                'Role_name' => $this->session->get("Role_name"),
                'Picture' => $this->session->get("Picture"),
            ];
            $this->session->set($this->Data);
            echo view('admin/dashboard', $data);
        } else {
            return redirect()->to(base_url('/home'));
        }
    }
}
