<?php
namespace App\Models;

use App\Models\BaseModel;

class Categories extends BaseModel
{
    protected $table = "category_courses";
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
    public function insertCategories($course_id, $category_id)
    {
        $sql = "INSERT INTO " . $this->table . "(course_id,category_id) VALUES('$course_id','$category_id')";
        return $this->getData($sql);
    }
    public function updateCategories($id, $course_id, $category_id)
    {
        $sql = "UPDATE " . $this->table . " SET course_id='$course_id' , category_id = '$category_id' WHERE id =" . $id;
        return $this->getData($sql);
    }

}

