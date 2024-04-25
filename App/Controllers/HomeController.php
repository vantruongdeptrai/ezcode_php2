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
        return $this->renderView('all-feature', compact('cate', 'course'));
    }
    public function register()
    {
        $dir = "register";
        $data = [];
        return $this->renderView($dir, $data);
    }
    public function registerPost()
    {
        if (isset($_POST["submit"])) {
            $errors = [];
            if (empty($_POST["username"])) {
                $errors[] = "Name cannot be blank!";
            }
            if (empty($_POST["email"])) {
                $errors[] = "Email cannot be blank!";
            } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email invalidate !";
            }
            if (empty($_POST["password"])) {
                $errors[] = "Password cannot be blank!";
            }
            if (empty($_POST["repassword"])) {
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
                if (is_object($checkEmail)) {
                    $errors[] = "Account already exist !";
                    redirect('errors', $errors, 'user/register');
                } else {
                    $result = $this->userModel->insertUsers(null, $username, '', $email, $password, '', '', '', $role);
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
        if (isset($_POST['submit'])) {
            $errors = [];
            $email_post = $_POST["email"];
            $password_post = $_POST["password"];
            if (empty($email_post)) {
                $errors[] = "Email cannot be blank!";
            } else if (!filter_var($email_post, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email invalidate !";
            }
            if (empty($password_post)) {
                $errors[] = "Password cannot be blank!";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'user/login');
            } else {
                $users = $this->userModel->checkAccount($email_post, $password_post);
                if (is_object($users)) {
                    $userArray = get_object_vars($users);
                    if (is_array($userArray)) {
                        $_SESSION['user'] = $userArray;
                        redirect('success', 'Login successfully !', 'user/login');
                    } else {
                        redirect('success', 'Account does not exist !', 'user/login');
                    }
                } else {
                    $errors[] = "Account does not exist !";
                    redirect('errors', $errors, 'user/login');
                }
            }
        }
    }
    public function logout()
    {
        session_unset();
        $dir = "layouts.home";
        $cate = $this->categoriesModel->getAllCategories();
        $course = $this->courseModel->getAllCourses();
        return $this->renderView('all-feature', compact('cate', 'course'));
    }
    public function listCourse()
    {
        $dir = "list-course";
        $course = $this->courseModel->getAllCourses();
        return $this->renderView($dir, compact('course'));
    }
    public function filter()
    {
        if (isset($_POST['filter'])) {
            $id_category = $_POST['category'];
            $price = $_POST['price'];
            $course = $this->courseModel->filter($price, $id_category);
            $dir = "list-course";
            return $this->renderView($dir, compact('course'));
        }
    }
    public function courseDetail($id)
    {
        $dir = "course-detail";
        $course = $this->courseModel->getCourseById($id);
        return $this->renderView($dir, compact('course'));
    }
    public function search()
    {
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $course = $this->courseModel->search($keyword);
            $dir = "list-course";
            return $this->renderView($dir, compact('course'));
        }
    }
    public function updateInfo()
    {
        $dir = "update-info";
        return $this->renderView($dir, []);
    }
    public function postInfo()
    {
        if (isset($_POST['submit'])) {
            $errors = [];
            $id = $_SESSION['user']['id'];
            $username_post = $_POST["username"];
            $fullname_post = $_POST["fullname"];
            $dob_post = $_POST["dob"];
            $tel_post = $_POST["tel"];
            $address_post = $_POST["address"];
            if (empty($username_post)) {
                $errors[] = "Username cannot be blank!";
            }
            if (empty($fullname_post)) {
                $errors[] = "Fullname cannot be blank!";
            }
            if (empty($dob_post)) {
                $errors[] = "Date of birth cannot be blank!";
            }
            if (empty($tel_post)) {
                $errors[] = "Phone number cannot be blank!";
            }
            if (empty($address_post)) {
                $errors[] = "Address cannot be blank!";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'user/update-info');
            } else {
                $result = $this->userModel->updateUser($id, $username_post, $fullname_post, $dob_post, $tel_post, $address_post);
                if ($result) {
                $_SESSION['user']['username'] = $username_post;
                $_SESSION['user']['fullname'] = $fullname_post;
                $_SESSION['user']['dob'] = $dob_post;
                $_SESSION['user']['tel'] = $tel_post;
                $_SESSION['user']['address'] = $address_post;  
                    redirect('success', 'Update successfully!', 'user/update-info');
                }

            }
        }
    }
}