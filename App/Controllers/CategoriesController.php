<?php
namespace App\Controllers;

use App\Models\Categories;
use App\Controllers\BaseController;

class CategoriesController extends BaseController
{
    protected $categoriesModel;
    public function __construct()
    {
        $this->categoriesModel = new Categories();
    }
    public function listCategories()
    {
        $categories = $this->categoriesModel->getAllCategories();
        return $this->render('Categories.list', compact('categories'));
    }
    public function formAddCategories()
    {
        return $this->render('Categories.add');
    }
    public function addCategories()
    {
        if (isset ($_POST["add"])) {
            $errors = [];
            if (empty ($_POST["name"])) {
                $errors[] = "Name cannot be blank!";
            }
            if (empty ($_POST["description"])) {
                $errors[] = "Description cannot be blank!";
            }
            if (empty ($_POST["status"])) {
                $errors[] = "Status cannot be blank!";
            }
            $target_dir = 'Public/images/';
            $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
            if (!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                $errors[] = "Thumbnail cannot be blank!";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'admin/categories/form-add');
            } else {
                $name = $_POST["name"];
                $description = $_POST["description"];
                $status = $_POST["status"];
                $thumbnail = $_FILES["thumbnail"]["name"];
                $result = $this->categoriesModel->insertCategories(null, $name, $description, $thumbnail, $status);
                if ($result) {
                    redirect('success', 'Create successfully !', 'admin/categories/form-add');
                }
            }
        }
    }
    public function editCategories($id)
    {
        $category = $this->categoriesModel->getCategorieById($id);
        $this->render('Categories.update', compact('category'));
    }
    public function updateCategories($id)
    {
        if (isset ($_POST["update"])) {
            $errors = [];
            if (empty ($_POST["name"])) {
                $errors[] = "Name cannot be blank!";
            }
            if (empty ($_POST["description"])) {
                $errors[] = "Description cannot be blank!";
            }
            if (empty ($_POST["status"])) {
                $errors[] = "Status cannot be blank!";
            }

            if (count($errors) > 0) {
                redirect('errors', $errors, 'admin/categories/form-update/' . $id);
            } else {
                $name = $_POST["name"];
                $description = $_POST["description"];
                $status = $_POST["status"];
                $thumbnail = $_FILES["thumbnail"]["name"];
                $target_dir = 'Public/images/';
                $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
                if (!move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                    //$errors[] = "Thumbnail cannot be blank!";
                }
                $result = $this->categoriesModel->updateCategories($id, $name, $description, $thumbnail, $status);
                if ($result) {
                    redirect('success', 'Update successfully !', 'admin/categories/form-update/' . $id);
                }
            }
        }
    }
    public function deleteCategories($id)
    {
        $result = $this->categoriesModel->deleteCategories($id);
        if ($result) {
            header("location:" . BASE_URL . "/admin/categories/list");
        }
    }
}
