<?php
namespace App\Models;

use App\Models\BaseModel;

class UserCourse extends BaseModel
{
    protected $table = 'user_course';

    public function listUserCourse(){
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function insertUserCourse($id,$user_id,$course_id,$status){
        $sql = "INSERT INTO $this->table VALUES(?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$user_id,$course_id,$status]);
    }
    public function myCourse($id){
        $sql = "SELECT courses.id , courses.name , courses.description , user_course.user_id
        FROM courses
        JOIN user_course ON user_course.course_id = courses.id
        WHERE user_course.user_id = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$id]);
    }
}

