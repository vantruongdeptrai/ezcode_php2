<?php
namespace App\Models;

use App\Models\BaseModel;

class Ratting extends BaseModel
{
    protected $table = 'ratings';

    public function getRatting(){
        $sql = "SELECT ratings.id , ratings.value, users.username , courses.name FROM ratings
        JOIN users ON ratings.user_id = users.id
        JOIN courses ON ratings.course_id = courses.id";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function insertRatting($id,$value,$user_id,$course_id){
        $sql = "INSERT INTO $this->table VALUES(?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$value,$user_id,$course_id]);
    }
}

