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
        if (isset($_POST["add"])) {
                $name = $_POST["name"];
                $description = $_POST["description"];
                $status = $_POST["status"];
                $thumbnail = $_FILES["thumbnail"]["name"];
                $target_dir = 'Public/images/';
                $target_file = $target_dir . basename($thumbnail);
                if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) {
                    echo '<script>alert("File đã được up load!")</script>';
                } else {
                    echo '<script>alert("Lỗi up load file!")</script>';
                }
                $result = $this->categoriesModel->insertCategories(null,$name, $description, $thumbnail, $status);
                if($result){
                    echo '<script>alert("Thêm mới thành công!")</script>';
                }   
        }
        // $categories = $this->categoriesModel->getAllCategories();
        // $this->render('Categories.list', compact('categories'));
    }
    public function editCategories($id)
    {
        $one_category = $this->categoriesModel->getCategorieById($id);
        $this->render('Categories.update', compact('one_category'));
    }
    public function updateCategories($id)
    {
        if (isset($_POST["update"])) {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $description = $_POST["description"];
            $thumbnail = $_POST["thumbnail"];
            $status = $_POST["status"];
            $this->categoriesModel->updateCategories($id, $name, $description, $thumbnail, $status);
        }
        $categories = $this->categoriesModel->getAllCategories();
        $this->render('Categories.list', compact('categories'));
    }
    public function deleteCategories($id)
    {
        $status = $_POST["status"];
        $this->categoriesModel->deleteCategories($id, $status);
        $categories = $this->categoriesModel->getAllCategories();
        $this->render('Categories.list', compact('categories'));
    }
}
