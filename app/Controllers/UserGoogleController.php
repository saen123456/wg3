<?php

namespace App\Controllers;

use App\Models\User_model;
use Google_Client;
use Google_Service_Oauth2;

class UserGoogleController extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }
    public function Google_Login()
    {
        $model = new User_model();

        $google_client = new Google_Client();
        //Set the OAuth 2.0 Client ID
        $google_client->setClientId('167253378744-q152i41crtqucvldcfoldl7ho2s7gfs1.apps.googleusercontent.com');
        //Set the OAuth 2.0 Client Secret key
        $google_client->setClientSecret('J3jyV8RB3qdLXQLjaI23w-Mu');
        //Set the OAuth 2.0 Redirect URI

        //$google_client->setRedirectUri('http://localhost:8080/projectwg/UserGoogleController/Google_Login');
        $google_client->setRedirectUri('https://workgress.online/UserGoogleController/Google_Login');


        $google_client->addScope('email');
        $google_client->addScope('profile');

        if (isset($_GET["code"])) {
            //It will Attempt to exchange a code for an valid authentication token.
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

            //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
            if (!isset($token['error'])) {
                //Set the access token used for requests
                $google_client->setAccessToken($token);

                //Store "access_token" value in $_SESSION variable for future use.
                $access_token = $token['access_token'];

                //Create Object of Google Service OAuth 2 class
                $google_service = new Google_Service_Oauth2($google_client);

                //Get user profile data from google
                $data = $google_service->userinfo->get();
                //Below you can find Get profile data and store into $_SESSION variable
                if (!empty($data['given_name'])) {
                    $user_first_name = $data['given_name'];
                }

                if (!empty($data['family_name'])) {
                    $user_last_name = $data['family_name'];
                }

                if (!empty($data['email'])) {
                    $user_email_address = $data['email'];
                }

                if (!empty($data['picture'])) {
                    $user_image = $data['picture'];
                }
            }
        }
        echo $user_first_name . " " . $user_last_name;
        if ($model->Check_User_Google_Exist($user_email_address)) { //Check_User_Exist() คือการเช็คEmail ว่ามีอยู่ในDatabase หรือเปล่า
            $model->Update_User_Google_Login($user_first_name, $user_last_name, $user_email_address, $user_image);
            $User_Data = $model->Check_User_Google_Login($user_email_address);
            while ($User = $User_Data->fetchRow()) {
                $User_id = $User['user_id'];
                $First_name = $User['first_name'];
                $Last_name = $User['last_name'];
                $Email = $User['email'];
                $Picture = $User['picture'];
                $Activated = $User['activated'];
                $Role_name = $User['role_name'];
            }
            $Full_name = $First_name . " " . $Last_name;
            //echo $Activated.' '.$Role_Name;
            if ($Activated == 1) {
                $this->Data = [
                    'User_id' => $User_id,
                    'Full_name' => $Full_name,
                    'Email' => $Email,
                    'Picture' => $Picture,
                    'Role_name' => $Role_name,
                    'Type' => 'google'
                ];
                $this->session->set($this->Data);
                return redirect()->to(base_url('homepage'));
            } else {
                echo "<script type='text/javascript'>alert('บางอย่างผิดพลาด');window.location.href = '" . base_url() . "/home';</script>";
            }
        } else {
            $model->Insert_Google_Register($user_first_name, $user_last_name, $user_email_address, $user_image); //Insert_Google_Register() คือการ Insert ข้อมูลลงใน Databse
            $User_Data = $model->Check_User_Google_Login($user_email_address);
            while ($User = $User_Data->fetchRow()) {
                $First_name = $User['first_name'];
                $Last_name = $User['last_name'];
                $Email = $User['email'];
                $Picture = $User['picture'];
                $Activated = $User['activated'];
                $Role_name = $User['role_name'];
            }
            $Full_name = $First_name . " " . $Last_name;
            if ($Activated == 1) {
                $this->Data = [
                    'Full_name' => $Full_name,
                    'Email' => $Email,
                    'Picture' => $Picture,
                    'Role_name' => $Role_name,
                    'Type' => 'google'
                ];
                $this->session->set($this->Data);
                return redirect()->to(base_url('homepage'));
            } else {
                echo "<script type='text/javascript'>alert('บางอย่างผิดพลาด');window.location.href = '" . base_url() . "/home';</script>";
            }
        }
    }
}
