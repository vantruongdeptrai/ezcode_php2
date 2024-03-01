<?php
namespace App\Controllers;
use App\Models\Categories;
class Comments
{
    protected $categoriesModel;
    public function __construct(){
        $this->categoriesModel = new Categories();
    } 
    public function listCategories(){
        $categories = $this->categoriesModel->getAllCategories();
        echo "list";
    }
    public function addCategories(){
        if (isset($_POST["add"])) {
            $name = $_POST["name"];
            $description = $_POST["description"];
            $thumbnail = $_POST["thumbnail"];
            $status = $_POST["status"];
            $this->categoriesModel->insertCategories($name,$description,$thumbnail,$status);
        }
        include "App/Views/Admin/Categories/add.php";
    }
    public function updateCategories(){
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            if (isset($_POST["update"])) {
                $id = $_POST["id"];
                $name = $_POST["name"];
                $description = $_POST["description"];
                $thumbnail = $_POST["thumbnail"];
                $status = $_POST["status"];
                $this->categoriesModel->updateCategories($id,$name,$description,$thumbnail,$status);
                $categories = $this->categoriesModel->getAllCategories();
                include "View/Admin/Categories/list.php";
            }
        } else {
            //
            $id = $_GET["id"];
            $oneCategory = $this->categoriesModel->getOneCategories($id);
            include "App/Views/Admin/Categories/update.php";
        }
        
    }
    public function deleteCategories(){
        if(isset($_GET["id"])){
            $id = $_POST["id"];
            $status = $_POST["status"];
            $this->categoriesModel->deleteCategories($id,$status);
            $categories = $this->categoriesModel->getAllCategories();
                include "View/Admin/Categories/list.php";
        }
    }
}
