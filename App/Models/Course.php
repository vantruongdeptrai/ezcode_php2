<?php
namespace App\Models;

use App\Models\BaseModel;

class Categories extends BaseModel
{
    protected $table = "courses";
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
    public function insertCategories($name, $description, $price, $status, $thumbnail, $total_registers)
    {
        $sql = "INSERT INTO " . $this->table . "(name,description,price,status,thumbnail,total_registers) VALUES('$name','$description','$price','$status','$thumbnail','$total_registers')";
        return $this->getData($sql);
    }

    public function updateCategories($id, $name, $description, $price, $status, $thumbnail, $total_registers)
    {
        $sql = "UPDATE " . $this->table . " SET name='$name' , description = '$description , price = '$price' , status='$status', thumbnail='$thumbnail', total_registers = '$total_registers' WHERE id =" . $id;
        return $this->getData($sql);
    }
    public function deleteCategories($id, $status)
    {
        $sql = "UPDATE " . $this->table . "SET status='$status' WHERE id=" . $id;
        return $this->getData($sql);
    }
}

