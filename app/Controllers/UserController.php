<?php

namespace App\Controllers;

use App\Models\User_model;

class UserController extends BaseController
{
    protected $session;
    protected $Data;

    public function __construct()
    {
        $this->cachePage(1);
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    /**** ส่วนของ View ****/
    public function index()
    {
        if ($this->session->get("Role_name") == 'student') {
            echo view('login/HomePage');
        } else if ($this->session->get("Role_name") == 'teacher') {
            echo view('login/HomePage');
        } else if ($this->session->get("Role_name") == 'admin') {
            echo view('login/HomePage');
        } else {
            echo view('home/HomePage');
        }

        /*echo "test database<br>";
        $model = new User_model(); //เรียก model User_model เพื่อใช่งานต่อ database
        $User_Data = $model->test();
        while ($User = $User_Data->fetchRow()) {
            $Role_Id = $User['role_id'];
            $Role_Name = $User['role_name'];
            echo $Role_Id . " " . $Role_Name . "<br>";
        }*/
    }
    //HomePage_Login
    public function homepage()
    {
        if ($this->session->get("Role_name") == 'student') {
            //echo view('navbar');
            echo view('login/HomePage');
        } else if ($this->session->get("Role_name") == 'teacher') {
            echo view('login/HomePage');
        } else if ($this->session->get("Role_name") == 'admin') {
            echo view('login/HomePage');
        } else {
            echo view('home/HomePage');
        }
    }

    /**
     * reset_password_page
     *
     * หน้ากรอง Email กรณีที่ User ลืม Password
     * 
     */
    public function reset_password_page()
    {
        echo view('home/Reset_Password');
    }
    /**
     * get_otp_page
     *
     * หน้าสำหรับ get ค่า OPT เช็คค่า Email 
     */
    public function get_otp_page()
    {
        if ($this->session->get("Email")) {
            echo view('home/Get_Otp');
        } else {
            echo view('home/HomePage');
        }
    }
    /**
     * get_otp_page
     *
     * หน้า confirm_password เช็คค่า Email 
     *
     */
    public function confirm_password()
    {
        if ($this->session->get("Email")) {
            echo view('home/Confirm_Password');
        } else {
            echo view('home/HomePage');
        }
    }

    /**
     * profile
     * หน้า profile เช็คสถานะ ของ User ก่อนเข้าใช่งาน
     * 
     */
    public function profile()
    {
        if ($this->session->get("Role_name") == 'student') {
            echo view('login/User_Profile');
        } else if ($this->session->get("Role_name") == 'teacher') {
            echo view('login/User_Profile');
        } else if ($this->session->get("Role_name") == 'admin') {
            echo view('login/User_Profile');
        } else {
            echo view('home/HomePage');
        }
    }
    /**
     * profile
     * หน้า profile เช็คสถานะ ของ User ก่อนเข้าใช่งาน
     * 
     */
    public function Profile_Account()
    {
        if ($this->session->get("Role_name") == 'student') {
            echo view('login/User_Account');
        } else if ($this->session->get("Role_name") == 'teacher') {
            echo view('login/User_Account');
        } else if ($this->session->get("Role_name") == 'admin') {
            echo view('login/User_Account');
        } else {
            echo view('home/HomePage');
        }
    }
    /**
     * Register
     *
     * สำหรับชี้ไปหน้า Register
     */
    public function Register()
    {
        echo view('home/Register');
    }
    public function login()
    {
        echo view('home/login');
    }
    /**
     * updatetoteacherpage
     * 
     * เช็คค่า หากเป็น นักศึกษา จะสามารถเข้าไปทำในระบบได้
     * เอาไว้อัพเดทเปลี่ยนเป็น คุณครู
     */
    public function updatetoteacherpage()
    {
        if ($this->session->get("Role_name") == 'student') {
            echo view('login/UpdatetoTeacher');
        } else {
            echo view('home/HomePage');
        }
    }
    public function add_course()
    {

        if ($this->session->get("Role_name") == 'teacher') {
            echo view('Course/course');
        } else {
            echo view('home/HomePage');
        }
    }


    /**********************************/
    /* User_Register */
    /*
    - request มาจากหน้า HomePage กรณีที่จะสมัครสมาชิกใหม่
    - รับข้อมูลมา 3 ประเภทคือ First_Name , Email ,Password
    - hash คือ การสุ่มตัวเลขขึ้นมา เพื่อเอาไปเช็คกับตัว Email 
    - เรียก model User_model เพื่อใช่งานต่อ database
    */
    public function User_Register()
    {

        $Full_Name = $this->request->getVar('Full_Name_Register'); //request First_Name_Register ดึงตัวแปรมาจาก หน้าPageเพื่อใช่งาน
        $Email  = $this->request->getVar('Email_Register'); //request Email_Register ดึงตัวแปรมาจาก หน้าPageเพื่อใช่งาน
        $Password  = $this->request->getVar('Password_Register'); //request Password_Register ดึงตัวแปรมาจาก หน้าPageเพื่อใช่งาน
        $hash = md5(rand(0, 1000)); // สุ่มตัวเลขสำหรับ เช็คEmail
        $model = new User_model(); // เรียก Model สำหรับติดต่อ Database
        $Password_md5 = md5($Password);
        if ($model->Check_User_Exist($Email)) { //Check_User_Exist() คือการเช็คEmail ว่ามีอยู่ในDatabase หรือเปล่า
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspอีเมลนี้มีผู้ใช้งานแล้ว&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('register'))->with('incorrect', $msg);
        } else {
            $model->Insert_Register($Full_Name, $Email, $Password_md5, $hash); //Insert_Register() คือการ Insert ข้อมูลลงใน Databse
            $this->Send_Confirmation($Full_Name, $Email, $Password, $hash); //Send_Confirmation() คือการ ส่งข้อมูลการยืนยันว่าเป็นอีเมลของ User จริงหรือไม่ ไปยัง Email ที่กรอกมา
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspกรุณายืนยันอีเมลของคุณก่อนเข้าสู่ระบบ&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('home'))->with('warning', $msg);
        }
    }
    /* Check_Email */
    /*
    - request มาจากหน้า HomePage กรณีที่จะสมัครสมาชิกใหม่
    - รับข้อมูล Email ของผู้สมัครมา
    - เรียก model User_model เพื่อใช่งานต่อ database
    - เอาไว้เช็คข้อมูล Email ในระบบ
    */
    public function Check_Email()
    {
        $Email  = $this->request->getVar('Email'); //request Email_Register ดึงตัวแปรมาจาก หน้าPageเพื่อใช่งาน
        $model = new User_model(); //เรียก model User_model เพื่อใช่งานต่อ database
        if ($model->Check_User_Exist($Email)) { //เป็นการเช็คว่าถ้ามีอีเมลนี้อยู่ในระบบ จะแสดง คำว่า อีเมลนี้ถูกใช้งานไปแล้ว 
            echo '<p style="color:#FF0000";> อีเมลนี้ถูกใช้งานไปแล้ว</p>';
        } else { //ถ้าไม่มีอีเมลนี้อยู่ในระบบ จะแสดง คำว่า อีเมลนี้สามารถใช้งานได้ 
            echo '<p style="color:#2ecc71";> อีเมลนี้สามารถใช้งานได้</p> ';
        }
    }

    /* Send_Confirmation */
    /*
    - รับข้อมูลจาก function User_Register เพื่อมาส่ง email ไปยัง email ของ User
    - ทำการเรียกใช่งานของ Services::email() เป็น library ของ CI4 
    */
    public function Send_Confirmation($Full_Name, $Email, $Password, $hash)
    {
        $email = \Config\Services::email();    //load email library
        $email->setFrom('pipat0909737525@gmail.com', 'Workgress'); // email ของผู้ส่ง
        $subject = "Welcome to Workgress!";    //subject
        $message = /*-----------email body starts-----------*/
            'Thanks for signing up, ' . $Full_Name . '!<br>
        
          Your account has been created.<br> 
          Here are your login details.<br>
          -------------------------------------------------<br>
          Email   : ' . $Email . '<br>
          Password: ' . $Password . '<br>
          -------------------------------------------------<br>
                          
          Please click this link to activate your account:<br>
              
          ' . base_url() . '/UserController/verify?' .
            'email=' . $Email . '&hash=' . $hash;


        /*-----------email body ends-----------*/
        $email->setTo($Email);
        $email->setSubject($subject);
        $email->setMessage($message);
        $email->send();
    }

    /* verify */
    /*
    - รับข้อมูลจาก email 
    - ทำการเรียกใช่งานของ Services::email() เป็น library ของ CI4 
    */
    public function verify()
    {
        $model = new User_model();
        $GetEmail = $_GET['email'];
        $GetHash = $_GET['hash'];
        $hash_verify = $model->Select_Hash($GetEmail);
        $hash_substr = substr($hash_verify, 20);

        if ((int) $GetHash == (int) $hash_substr) {
            //check whether the input hash value matches the hash value retrieved from the database
            $model->Verify_Register($GetEmail); //update the status of the user as verified
            /*---Now you can redirect the user to whatever page you want---*/
            //echo view('Register_success');
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspยืนยันอีเมลเรียบร้อยคุณสามารถเข้าสู่ระบบได้ทันที&nbsp&nbsp&nbsp&nbsp&nbsp';
            $User_Data = $model->Check_User_Pass_Login($GetEmail);

            while ($User = $User_Data->fetchRow()) {
                $User_id = $User['user_id'];
                $Full_Name = $User['first_name'];
                $Email = $User['email'];
                $Password = $User['password'];
                if ($User['picture'] != " ") {
                    $Picture = $User['picture'];
                }
                $Activated = $User['activated'];
                $Role_Name = $User['role_name'];
            }
            $this->Data = [
                'User_id' => $User_id,
                'Full_name' => $Full_Name,
                'Role_name' => $Role_Name,
                'Email' => $Email,
                'Picture' => $Picture,
                'Type' => 'normal',
            ];
            $this->session->set($this->Data);
            return redirect()->to(base_url('homepage'))->with('correct', $msg);
        }
    }
    /**
     * Check_Email_Login
     *
     * เอาไว้เช็ค Email ใน Database ว่ามีหรือยัง
     * 
     */
    public function Check_Email_Login()
    {
        $model = new User_model();
        $Email_Login  = $this->request->getVar('Email_Login');
        if ($model->Check_Email_Login($Email_Login)) { //เป็นการเช็คว่าถ้ามีอีเมลนี้อยู่ในระบบ จะแสดง คำว่า อีเมลนี้ไม่มีอยู่ในระบบ
            echo '<p style="color:#FF0000";> อีเมลนี้ไม่มีอยู่ในระบบ</p>';
        }
    }
    /**
     * User_Login
     *
     * ส่วนของการ Login เข้าสู่ระบบ
     * รับค่า อยู่ 2 ค่า คือ Email , Pass 
     * และนำไปเช็คกับใน Database ว่ามีจริงหรือไม่
     * 
     */
    public function User_Login()
    {
        //$session = \Config\Services::session();

        $model = new User_model();
        $Email_Login  = $this->request->getVar('Email_Login');
        $Password_Login = md5($this->request->getVar('Password_Login'));
        $User_Data = $model->Check_User_Pass_Login($Email_Login);

        while ($User = $User_Data->fetchRow()) {
            $User_id = $User['user_id'];
            $Full_Name = $User['first_name'];
            $Email = $User['email'];
            $Password = $User['password'];
            if ($User['picture'] != " ") {
                $Picture = $User['picture'];
            }
            $Activated = $User['activated'];
            $Role_Name = $User['role_name'];
        }
        // if (isset($Email)) {
        //     echo $Email;
        // } else {
        //     echo "error";
        // }

        if (isset($Email)) {
            if ($Email_Login == $Email && $Password_Login == $Password && $Activated == 1) {
                $this->Data = [
                    'User_id' => $User_id,
                    'Full_name' => $Full_Name,
                    'Role_name' => $Role_Name,
                    'Email' => $Email,
                    'Picture' => $Picture,
                    'Type' => 'normal',
                ];
                $this->session->set($this->Data);
                return redirect()->to(base_url('homepage'));
            } else if ($Email_Login == $Email && $Password_Login == $Password && $Activated == 1 && $Role_Name == 'teacher') {
                $this->Data = [
                    'User_id' => $User_id,
                    'Full_name' => $Full_Name,
                    'Role_name' => $Role_Name,
                    'Email' => $Email,
                    'Picture' => $Picture,
                    'Type' => 'normal'

                ];
                $this->session->set($this->Data);
                return redirect()->to(base_url('homepage'));
            } else if ($Email_Login == $Email && $Password_Login == $Password && $Activated == 1 && $Role_Name == 'admin') {
                $this->Data = [
                    'User_id' => $User_id,
                    'Full_name' => $Full_Name,
                    'Role_name' => $Role_Name,
                    'Email' => $Email,
                    'Picture' => $Picture,
                ];
                $this->session->set($this->Data);
                return redirect()->to(base_url('homepage'));
            } else if ($Email_Login == $Email && $Password_Login == $Password && $Activated == 0) {
                $msg = '&nbsp&nbsp&nbsp&nbsp&nbspคุณต้องยืนยันอีเมลก่อน&nbsp&nbsp&nbsp&nbsp&nbsp';
                return redirect()->to(base_url('/login'))->with('incorrect', $msg);
                //echo '<p style="color:#FF0000";>คุณต้องยืนยันอีเมลก่อน</p>';
            } else {
                $msg = '&nbsp&nbsp&nbsp&nbsp&nbspอีเมล หรือ รหัสผ่านผิดกรุณากรอกใหม่&nbsp&nbsp&nbsp&nbsp&nbsp';
                return redirect()->to(base_url('/login'))->with('incorrect', $msg);
                //echo '<p style="color:#FF0000";>อีเมล หรือ รหัสผ่านผิดกรุณากรอกใหม่</p>';
            }
        } else {
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspอีเมล หรือ รหัสผ่านผิดกรุณากรอกใหม่&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('/login'))->with('incorrect', $msg);
        }
    }
    /**
     * Update_To_Teacher
     *
     * Update ให้นักเรียนเป็นคุณครู
     * 
     */
    public function Update_To_Teacher()
    {
        $model = new User_model();
        $Email  = $this->session->get("Email");
        $Type  = $this->session->get("Type");
        //echo $Email." ".$Type;
        if ($model->Update_To_Teacher($Email, $Type)) {
            $User_Data = $model->Select_Role($Email, $Type);
            while ($User = $User_Data->fetchRow()) {
                $Role_Name = $User['role_name'];
            }
            $this->Data = [
                'Role_name' => $Role_Name,
            ];
            $this->session->set($this->Data);
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspคุณเป็นคุณครูเรียบร้อย&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('homepage'))->with('correct', $msg);
        } else {
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspมีบางอย่างผิดพลาด&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('homepage'))->with('incorrect', $msg);
        }
    }
    /**
     * Update_Profile
     *
     * เปลี่ยนแปลงข้อมูล Profile 
     * ตอนนี้เปลี่ยนแปลงได้แต่ ชื่อ แต่สามารถเพิ่มได้
     */
    public function Update_Profile()
    {
        $model = new User_model();
        $Full_Name  = $this->request->getVar('Full_Name');
        $Email  = $this->session->get("Email");
        if ($model->Update_Profile($Email, $Full_Name)) {
            $User_Data = $model->Select_AllData($Email);
            while ($User = $User_Data->fetchRow()) {
                $Full_Name = $User['first_name'];
                $Email = $User['email'];
            }
            $this->Data = [
                'Full_name' => $Full_Name,
                'Email' => $Email,
            ];
            $this->session->set($this->Data);
            $msg = '&nbsp&nbsp&nbspเปลี่ยนข้อมูลของคุณเรียบร้อย&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('profile'))->with('correct', $msg);
        } else {
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspมีบางอย่างผิดพลาด&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('profile'))->with('warning', $msg);
        }
    }
    /**
     * Change_Password
     *
     * เปลี่ยนรหัสผ่าน โดยใช่ รหัสเก่ามาตรวจสอบกับระบบและเปลี่ยนแปลงรหัสใหม่
     */
    public function Change_Password()
    {
        $model = new User_model();
        $Email  = $this->session->get("Email");
        $Password_Old = md5($this->request->getVar('Password_Old'));
        $Password_New = md5($this->request->getVar('Password_New'));
        $Password_ac = md5($this->request->getVar('Password_New'));
        $User_Data = $model->Select_AllData($Email);
        while ($User = $User_Data->fetchRow()) {
            $Password = $User['password'];
        }
        if ($Password == $Password_Old) {
            if ($Password_New == $Password_Old) {
                //echo "<script type='text/javascript'>alert('รหัสผ่านไม่สามารถเหมือนอันเก่าได้ หรือ มีบางอย่างผิดพลาด');window.location.href = '" . base_url() . "/home';</script>";
                $msg = '&nbsp&nbsp&nbsp&nbsp&nbspรหัสผ่านไม่สามารถเหมือนอันเก่าได้&nbsp&nbsp&nbsp&nbsp&nbsp';
                return redirect()->to(base_url('profile'))->with('warning', $msg);
            } else if ($Password_New == $Password_ac && $Password_New != $Password_Old) {
                $model->Updata_Password($Email, $Password_New);
                //return redirect()->to(base_url('logout'));
                $msg = '&nbsp&nbsp&nbsp&nbsp&nbspเปลี่ยนรหัสผ่านเรียบร้อย&nbsp&nbsp&nbsp&nbsp&nbsp';
                return redirect()->to(base_url('profile'))->with('correct', $msg);
            }
        } else {
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspรหัสผ่านเก่าไม่ตรงกับในระบบ&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('profile'))->with('warning', $msg);
        }
    }
    /**
     * User_Logout
     *
     * ออกจากระบบ 
     */
    public function User_Logout()
    {
        $this->session->remove($this->Data);
        $this->session->destroy();
        return redirect()->to(base_url('home'));
    }
    /**
     * User_Delete
     *
     * ลบ User ทิ้ง
     * ตอนนี้ยังไม่ได้ทำ เนื่องจากไม่ชัวในการลบ
     */
    public function User_Delete()
    {
        $model = new User_model();
        $Email  = $this->session->get("Email");
        $Type  = $this->session->get("Type");
        //echo $Email.' '.$Type;
        if ($model->Delete_User($Email, $Type)) {
            $this->session->remove($this->Data);
            $this->session->destroy();
            echo "<script type='text/javascript'>alert('ลบ Account เรียบร้อย');window.location.href = '" . base_url() . "/home';</script>";
        } else {
            echo "<script type='text/javascript'>alert('มีบางอย่างผิดพลาด');window.location.href = '" . base_url() . "/home';</script>";
        }
    }
    /**
     * User_Forget_Password
     *
     * กรณีที่ User ลืมรหัสผ่านของ User
     * จะรับ Email ที่User สมัครมา ส่งไป OTP ไปยัง Email นั้นๆ
     */
    public function User_Forget_Password()
    {
        $model = new User_model();
        $Email_Forget  = $this->request->getVar("Email_Forget");
        //$Password_Forget  = md5($this->request->getVar("Password_Forget"));
        $OTP = mt_rand(100000, 999999);
        //echo $OTP . " " . $Email_Forget;

        if ($model->Check_Email_Login($Email_Forget)) {
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspไม่มีอีเมลนี้ในระบบ กรุณากรอกใหม่&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('reset_password'))->with('incorrect', $msg);
        } else {
            /*$model->User_Forget_Password($Email_Forget, $Password_Forget);
            $msg = '&nbsp&nbsp&nbspเปลี่ยนรหัสผ่านของคุณเรียบร้อย&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('home'))->with('correct', $msg);*/
            $this->Send_OTP($Email_Forget, $OTP);
            $this->Data = [
                'OTP' => $OTP,
                'Email' => $Email_Forget
            ];
            $this->session->set($this->Data);
            return redirect()->to(base_url('get_otp'));
        }
    }
    /**
     * Send_OTP
     *
     * @param  mixed $Email_Forget
     * @param  mixed $OTP
     * รับค่า 2 ค่ามา
     * เพือทำการส่ง Email ไปยัง Email ของ User ที่ลืมรหัสผ่าน
     *
     */
    public function Send_OTP($Email_Forget, $OTP)
    {
        $email = \Config\Services::email();    //load email library
        $email->setFrom('pipat0909737525@gmail.com', 'Workgress'); // email ของผู้ส่ง
        $subject = "Reset Password Workgress!";    //subject
        $message = /*-----------email body starts-----------*/
            'Reset Password Workgress!, ' . $Email_Forget . '!<br>
        
          Reset Password For Your account .<br> 
          Here are your OTP details.<br>
          -------------------------------------------------<br>
          OTP   : ' . $OTP . '<br>
          -------------------------------------------------<br>
                          
          Please click this link to activate your account:<br> ';

        /*-----------email body ends-----------*/
        $email->setTo($Email_Forget);
        $email->setSubject($subject);
        $email->setMessage($message);
        $email->send();
    }
    /**
     * Get_OTP
     *
     * ตรวจสอบค่า OTP ที่ User ได้กรองเข้ามา
     *
     */
    public function Get_OTP()
    {
        $model = new User_model();
        $User_Input_OTP  = $this->request->getVar("User_Input_OTP");
        $OTP_From_Email = $this->session->get("OTP");
        $Email_Forget = $this->session->get("Email");

        //echo $User_Input_OTP . " " . $OTP_From_Email . " " . $Email_Forget . " " . $Password;
        if ($User_Input_OTP == $OTP_From_Email) {
            return redirect()->to(base_url('confirm_password'));
        } else {
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspOTP ที่กรอกไม่ถูกต้อง กรุณาลองใหม่&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('get_otp'))->with('incorrect', $msg);
        }
    }
    /**
     * Reset_Password
     * 
     * กรณีที่ได้ยืนยัน OTP เสร็จแล้ว User สามารถเปลี่ยนแปลง Password ได้เลย
     * 
     */
    public function Reset_Password()
    {
        $model = new User_model();
        $Email_Forget = $this->session->get("Email");
        $Password = md5($this->request->getVar("Password"));
        $Password_Confirm = md5($this->request->getVar("Password_Confirm"));

        //echo $Email_Forget . " " . $Password;
        if ($Password == $Password_Confirm) {
            $model->User_Forget_Password($Email_Forget, $Password);

            $msg = '&nbsp&nbsp&nbspเปลี่ยนรหัสผ่านของคุณเรียบร้อย&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('home'))->with('correct', $msg);
        } else {
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspรหัสผ่านที่กรอกมาไม่ตรงกัน&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('confirm_password'))->with('incorrect', $msg);
        }
    }
    /**
     * Upload_Picture
     *
     * สำหรับเปลี่ยนแปลงรูปโปรไฟล์ของเรา ซึ่ง ใช่ Services::image() มาช่วยในการส่งค่า Path
     * 
     */
    public function Upload_Picture()
    {
        $model = new User_model();
        $Email = $this->session->get("Email");
        $Type = $this->session->get("Type");

        $Photo = $this->request->getFile('photo');

        //echo $Photo->getClientName();
        if ($Photo->getSize() > 0) {
            $Photo_Random_Name = $Photo->getRandomName();
            $upload_to = 'public/upload/';

            $image = \Config\Services::image()
                ->withFile($Photo)
                ->fit(626, 626, 'center')
                ->save('./public/upload/' . $Photo_Random_Name);

            $Photo_Type = $upload_to . $Photo_Random_Name;
            //$Photo->move('./public/upload',$Photo_Random_Name);
            $model->Update_Picture_User($Email, $Type, $Photo_Type);
            $User_Data = $model->Select_AllData($Email);
            while ($User = $User_Data->fetchRow()) {
                $Picture = $User['picture'];
            }
            //echo '<img src="'.$Picture.'"/>';
            $this->Data = [
                'Picture' => $Picture,
            ];
            $this->session->set($this->Data);
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspอัพเดทโปรไฟล์เรียบร้อย&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('profile'))->with('correct', $msg);
        } else {
            //echo "error";
            $msg = '&nbsp&nbsp&nbsp&nbsp&nbspคุณยังไม่ได้เลือกรูปภาพ&nbsp&nbsp&nbsp&nbsp&nbsp';
            return redirect()->to(base_url('profile'))->with('warning', $msg);
        }
    }
}
