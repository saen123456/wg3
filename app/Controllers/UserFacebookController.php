<?php

namespace App\Controllers;

namespace App\Controllers;

use App\Models\User_model;

class UserFacebookController extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function Facebook_Login()
    {
        $model = new User_model();
        $facebook = new \Facebook\Facebook([
            'app_id'      => '2904339173012416',
            'app_secret'     => '4c4a976d3352914f41fbe32e378a3c35',
            'default_graph_version'  => 'v7.0'
        ]);

        $facebook_helper = $facebook->getRedirectLoginHelper();
        //echo $_GET['code'];
        if (isset($_GET['code'])) {
            if (isset($_SESSION['access_token'])) {
                $access_token = $_SESSION['access_token'];
            } else {
                $access_token = $facebook_helper->getAccessToken();

                $_SESSION['access_token'] = $access_token;

                $facebook->setDefaultAccessToken($_SESSION['access_token']);
            }

            $graph_response = $facebook->get("/me?fields=name,email", $access_token);

            $facebook_user_info = $graph_response->getGraphUser();

            if (!empty($facebook_user_info['id'])) {
                //$user_image = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
                $user_image = 'https://graph.facebook.com/' . $facebook_user_info['id'] . '/picture?type=large';
            }

            if (!empty($facebook_user_info['name'])) {
                $user_name = $facebook_user_info['name'];
            }

            if (!empty($facebook_user_info['email'])) {
                $user_email_address = $facebook_user_info['email'];
            }
        }
        if ($model->Check_User_Facebook_Exist($user_email_address)) { //Check_User_Facebook_Exist() คือการเช็คEmail ว่ามีอยู่ในDatabase หรือเปล่า
            $model->Update_User_Facebook_Login($user_name, $user_email_address, $user_image);
            $User_Data = $model->Check_User_Facebook_Login($user_email_address);
            while ($User = $User_Data->fetchRow()) {
                $User_id = $User['user_id'];
                $Full_name = $User['first_name'];
                $Email = $User['email'];
                $Picture = $User['picture'];
                $Activated = $User['activated'];
                $Role_name = $User['role_name'];
            }

            if ($Activated == 1) {
                $this->Data = [
                    'User_id' => $User_id,
                    'Full_name' => $Full_name,
                    'Email' => $Email,
                    'Picture' => $Picture,
                    'Role_name' => $Role_name,
                    'Type' => 'facebook'
                ];
                $this->session->set($this->Data);
                return redirect()->to(base_url('homepage'));
            } else {
                echo "<script type='text/javascript'>alert('บางอย่างผิดพลาด');window.location.href = '" . base_url() . "/home';</script>";
            }
        } else {
            $model->Insert_Facebook_Register($user_name, $user_email_address, $user_image); //Insert_Facebook_Register() คือการ Insert ข้อมูลลงใน Databse
            $User_Data = $model->Check_User_Facebook_Login($user_email_address);
            while ($User = $User_Data->fetchRow()) {
                $Full_name = $User['first_name'];
                $Email = $User['email'];
                $Picture = $User['picture'];
                $Activated = $User['activated'];
                $Role_name = $User['role_name'];
            }
            if ($Activated == 1) {
                $this->Data = [
                    'Full_name' => $Full_name,
                    'Email' => $Email,
                    'Picture' => $Picture,
                    'Role_name' => $Role_name,
                    'Type' => 'facebook'
                ];
                $this->session->set($this->Data);
                return redirect()->to(base_url('homepage'));
            } else {
                echo "<script type='text/javascript'>alert('บางอย่างผิดพลาด');window.location.href = '" . base_url() . "/home';</script>";
            }
        }
    }
}
