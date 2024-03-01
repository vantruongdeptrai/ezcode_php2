<?php
namespace App\Models;

use App\Models\BaseModel;

class Categories extends BaseModel
{
    protected $table = "categories";
    public function getAllCategories()
    {
        $sql = "SELECT * FROM " . $this->table;
        //var_dump($sql);
        return $this->getData($sql);
    }
    public function getOneCategories($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id=" . $id;
        return $this->getDataByID($sql);
    }
    public function insertCategories($name, $description, $thumbnail, $status)
    {
        $sql = "INSERT INTO " . $this->table . "(name,description,thumbnail,status) VALUES('$name','$description','$thumbnail','$status')";
        return $this->getData($sql);
    }
    public function updateCategories($id, $name, $description, $thumbnail, $status)
    {
        $sql = "UPDATE " . $this->table . " SET name='$name' , description = '$description , thumbnail='$thumbnail', status='$status' WHERE id =" . $id;
        return $this->getData($sql);
    }
    public function deleteCategories($id, $status)
    {
        $sql = "UPDATE " . $this->table . "SET status='$status' WHERE id=" . $id;
        return $this->getData($sql);
    }
}

