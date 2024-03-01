<?php
namespace App\Models;

use App\Models\BaseModel;

class Categories extends BaseModel
{
    protected $table = "user_courses";
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
    public function insertCategories($user_id, $course_id, $status, $payment_status)
    {
        $sql = "INSERT INTO " . $this->table . "(user_id,course_id,status,payment_status) VALUES('$user_id','$course_id','$status','$payment_status')";
        return $this->getData($sql);
    }
    public function updateCategories($id, $user_id, $course_id, $status, $payment_status)
    {
        $sql = "UPDATE " . $this->table . " SET user_id='$user_id' , course_id = '$course_id' , status='$status', payment_status='$payment_status' WHERE id =" . $id;
        return $this->getData($sql);
    }
    public function deleteCategories($id, $status)
    {
        $sql = "UPDATE " . $this->table . "SET status='$status' WHERE id=" . $id;
        return $this->getData($sql);
    }
}

