<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Courses;
use App\Models\Ratting;
use App\Models\Users;

class HomeController extends BaseController
{
    protected $userModel;
    protected $categoriesModel;
    protected $courseModel; 
    protected $rattingModel;
    protected $commentModel;
    public function __construct()
    {
        $this->userModel = new Users();
        $this->categoriesModel = new Categories();
        $this->courseModel = new Courses();
        $this->rattingModel = new Ratting();
        $this->commentModel = new Comments();
    }
    public function home()
    {
        $dir = "layouts.home";
        $cate = $this->categoriesModel->getAllCategories();
        $course = $this->courseModel->getAllCourses();
        //$category_id = $course->id_category;
        return $this->renderView('all-feature', compact('cate','course'));
    }
    public function register()
    {
        $dir = "register";
        $data = [];
        return $this->renderView($dir, $data);
    }
    public function registerPost()
    {
        if (isset ($_POST["submit"])) {
            $errors = [];
            if (empty ($_POST["username"])) {
                $errors[] = "Name cannot be blank!";
            }
            if (empty ($_POST["email"])) {
                $errors[] = "Email cannot be blank!";
            } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email invalidate !";
            }
            if (empty ($_POST["password"])) {
                $errors[] = "Password cannot be blank!";
            }
            if (empty ($_POST["repassword"])) {
                $errors[] = "Please fill repassword!";
            }
            
            if (count($errors) > 0) {
                redirect('errors', $errors, 'user/register');
            } else {
                $username = $_POST["username"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $role = 'customer';
                $checkEmail = $this->userModel->checkEmail($email);
                // var_dump($checkEmail);
                // die;
                if(is_object($checkEmail)){
                    $errors[]="Account already exist !";
                    redirect('errors', $errors, 'user/register');
                }else{
                    $result = $this->userModel->insertUsers(null, $username, '', $email, $password, '', '', '', '', '', $role);
                    if ($result) {
                        redirect('success', 'Create successfully !', 'user/register');
                    }
                }
            }
        }
    }
    public function login()
    {
        $dir = "login";
        $data = [];
        return $this->renderView($dir, $data);
    }
    public function loginPost()
    {
        if (isset ($_POST['submit'])) {
            $errors = [];
            $email_post = $_POST["email"];
            $password_post = $_POST["password"];
            if (empty ($email_post)) {
                $errors[] = "Email cannot be blank!";
            }
            else if (!filter_var($email_post, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email invalidate !";
            }
            if (empty ($password_post)) {
                $errors[] = "Password cannot be blank!";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'user/login');
            } else {
                $users = $this->userModel->checkAccount($email_post,$password_post);
                if(is_object($users)){
                    $userArray = get_object_vars($users);
                    if(is_array($userArray)){
                        $_SESSION['user'] = $userArray;   
                        redirect('success', 'Login successfully !', 'user/login');
                    }else{
                        redirect('success', 'Account does not exist !', 'user/login');
                    }
                }else{
                    $errors [] = "Account does not exist !";
                    redirect('errors', $errors, 'user/login');
                }
            }
        }
    }
    public function logout(){
        session_unset();
        $dir = "layouts.home";
        $cate = $this->categoriesModel->getAllCategories();
        $course = $this->courseModel->getAllCourses();
        return $this->renderView('all-feature', compact('cate','course'));
    }
    public function listCourse()
    {
        $dir = "list-course";
        $course = $this->courseModel->getAllCourses();
        return $this->renderView($dir, compact('course'));
    }
    public function filter(){
        if(isset($_POST["submit"])){
            $id_category = $_POST["id_category"];
            $price = $_POST["price"];
            if(empty($id_category)){
                $course = $this->courseModel->filterByPrice($price);
                $dir = "list-course";
                return $this->renderView($dir, compact('course'));
            }
            if(empty($id_category)){
                $course = $this->courseModel->filterByCategory($id_category);
                $dir = "list-course";
                return $this->renderView($dir, compact('course'));
            }
            if(empty($id_category)&&empty($id_category)){
                $dir = "list-course";
                $course = $this->courseModel->getAllCourses();
                return $this->renderView($dir, compact('course'));
            }
            if(!empty($id_category)&&!empty($id_category)){
                $filterByPrice = $this->courseModel->filterByPrice($price);
                $filterByCategory = $this->courseModel->filterByCategory($id_category);
                //$dir = "list-course";
                //return $this->renderView($dir, compact('course'));
            }
        }
        
    }
    public function courseDetail($id){
        $dir = "course-detail";
        $course = $this->courseModel->getCourseById($id);
        return $this->renderView($dir, compact('course'));
    }
}