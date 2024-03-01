<?php
namespace App\Models;

use App\Models\BaseModel;

class Categories extends BaseModel
{
    protected $table = "comments";
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
    public function insertCategories($content, $user_id, $course_id, $image)
    {
        $sql = "INSERT INTO " . $this->table . "(content,user_id,course_id,image) VALUES('$content','$user_id','$course_id','$image')";
        return $this->getData($sql);
    }
    public function updateCategories($id, $content, $user_id, $course_id, $image)
    {
        $sql = "UPDATE " . $this->table . " SET content='$content' , user_id = '$user_id , course_id='$course_id', image='$image' WHERE id =" . $id;
        return $this->getData($sql);
    }

}

