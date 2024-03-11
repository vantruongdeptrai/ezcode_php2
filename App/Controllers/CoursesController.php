<?php
namespace App\Controllers;

use App\Models\Courses;

class CoursesController extends BaseController
{
    protected $coursesModel;
    public function __construct()
    {
        $this->coursesModel = new Courses();
    }
    public function listCategories()
    {
        $courses = $this->coursesModel->getAllCourses();
        return $this->render('Courses.list', compact('courses'));
    }
    public function formAddCourses()
    {
        return $this->render('Courses.add');
    }
    public function addCourses()
    {
        if (isset($_POST["add"])) {
            $errors = [];
            if (empty($_POST["name"])) {
                $errors[] = "Name cannot be blank!";
            }
            if (empty($_POST["description"])) {
                $errors[] = "Description cannot be blank!";
            }
            if (empty($_POST["price"])) {
                $errors[] = "Price cannot be blank!";
            } else if ($_POST["price"] < 0 || !ctype_digit($_POST["price"])) {
                $errors[] = "Price must be digit or greater zero !";
            }
            if (empty($_POST["status"])) {
                $errors[] = "Status cannot be blank!";
            }
            $target_dir = 'Public/images/';
            $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
            if (!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                $errors[] = "Thumbnail cannot be blank!";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'admin/courses/form-add');
            } else {
                $name = $_POST["name"];
                $description = $_POST["description"];
                $price = $_POST["price"];
                $status = $_POST["status"];
                $total_register = 0;
                $thumbnail = $_FILES["thumbnail"]["name"];
                $result = $this->coursesModel->insertCourses(null, $name, $description, $price, $status, $thumbnail,$total_register);
                if ($result) {
                    redirect('success', 'Create successfully !', 'admin/courses/form-add');
                }
            }
        }
    }
    public function editCourse($id)
    {
        $courses = $this->coursesModel->getCourseById($id);
        $this->render('Courses.update', compact('courses'));
    }
    public function updateCourses($id)
    {
        if (isset($_POST["update"])) {
            $errors = [];
            if (empty($_POST["name"])) {
                $errors[] = "Name cannot be blank!";
            }
            if (empty($_POST["description"])) {
                $errors[] = "Description cannot be blank!";
            }
            if (empty($_POST["price"])) {
                $errors[] = "Price cannot be blank!";
            } else if ($_POST["price"] < 0 || !ctype_digit($_POST["price"])) {
                $errors[] = "Price must be digit or greater zero !";
            }
            if (empty($_POST["status"])) {
                $errors[] = "Status cannot be blank!";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'admin/courses/form-update/' . $id);
            } else {
                $name = $_POST["name"];
                $description = $_POST["description"];
                $price= $_POST["price"];
                $status = $_POST["status"];
                $thumbnail = $_FILES["thumbnail"]["name"];
                $target_dir = 'Public/images/';
                $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
                if (!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                    //$errors[] = "Thumbnail cannot be blank!";
                }
                $result = $this->coursesModel->updateCourses($id, $name, $description,$price, $status, $thumbnail);
                if ($result) {
                    redirect('success', 'Update successfully !', 'admin/courses/form-update/' . $id);
                }
            }
        }
    }
    public function deleteCourses($id)
    {
        $result = $this->coursesModel->deleteCourses($id);
        if ($result) {
            header("location:" . BASE_URL . "/admin/courses/list");
        }
    }
}


