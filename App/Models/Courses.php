<?php
namespace App\Models;

use App\Models\BaseModel;

class Courses extends BaseModel
{
    protected $table = "courses";

    public function getAllCourses()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function getCourseById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id= ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function insertCourses($id,$name,$description,$price,$status,$thumbnail,$total_register)
    {
        $sql = "INSERT INTO $this->table VALUES(?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$name,$description,$price,$status,$thumbnail,$total_register]);
    }
    public function updateCourses($id,$name,$description,$price,$status,$thumbnail)
    {
        if($thumbnail==""){
            $sql = "UPDATE $this->table SET name=? , description = ?, price = ? , status=?  WHERE id = ?" ;
            $this->setQuery($sql);
            return $this->execute([$name,$description,$price,$status,$id]);
        }else{
            $sql = "UPDATE $this->table SET name=? , description = ?, price = ? , status=? , thumbnail=? WHERE id = ?" ;
            $this->setQuery($sql);
            return $this->execute([$name,$description,$price,$status,$thumbnail,$id]);
        }
    }
    public function deleteCourses($id)
    {
        $sql = "UPDATE $this->table SET status='inactive' WHERE id=?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}

