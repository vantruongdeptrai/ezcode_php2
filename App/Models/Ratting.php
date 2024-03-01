<?php
namespace App\Models;

use App\Models\BaseModel;

class Categories extends BaseModel
{
    protected $table = "ratings";
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
    public function insertCategories($user_id, $course_id, $value, $note, $image)
    {
        $sql = "INSERT INTO " . $this->table . "(user_id,course_id,value,note,image) VALUES('$user_id','$course_id','$value','$note','$image')";
        return $this->getData($sql);
    }
    public function updateCategories($id, $user_id, $course_id, $value, $note, $image)
    {
        $sql = "UPDATE " . $this->table . " SET user_id= '$user_id',course_id='$course_id',value='$value',note='$note',image='$image' WHERE id =" . $id;
        return $this->getData($sql);
    }

}

