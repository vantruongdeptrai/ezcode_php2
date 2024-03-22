<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Users;
class HomeController extends BaseController
{
    protected $userModel;
    public function __construct(){
        $this->userModel = new Users();
    }
    public function home(){
        $dir = "home";
        $data = [];
        return $this->renderView($dir,$data);
    }
    public function register(){
        $dir = "register";
        $data = [];
        return $this->renderView($dir,$data);
    }
    public function registerPost(){
        if (isset ($_POST["submit"])) {
            $errors = [];
            if (empty ($_POST["fullname"])) {
                $errors[] = "Name cannot be blank!";
            }
            if (empty ($_POST["email"])) {
                $errors[] = "Status cannot be blank!";
            }
            else if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
                $errors[] = "Email invalidate !";
            }
            if (empty ($_POST["password"])) {
                $errors[] = "Password cannot be blank!";
            }
            if (empty ($_POST["repassword"])) {
                $errors[] = "Please fill repassword!";
            }
            // $target_dir = 'Public/images/';
            // $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
            // if (!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
            //     $errors[] = "Thumbnail cannot be blank!";
            // }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'user/register');
            } else {
                $fullname = $_POST["fullname"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $role = 'customer';
                $result = $this->userModel->insertUsers(null,'',$fullname,$email,$password,'','','','','',$role);
                if ($result) {
                    redirect('success', 'Create successfully !', 'user/register');
                }
            }
        }
    }
    public function login(){
        $dir = "login";
        $data = [];
        return $this->renderView($dir,$data);
    }
}