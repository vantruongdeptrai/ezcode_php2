<?php
namespace App\Models;

use App\Models\BaseModel;

class Ratting extends BaseModel
{
    protected $table = 'ratings';

    public function getRatting(){
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function insertRatting($id,$value,$user_id,$course_id){
        $sql = "INSERT INTO $this->table VALUES(?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$value,$user_id,$course_id]);
    }
}

