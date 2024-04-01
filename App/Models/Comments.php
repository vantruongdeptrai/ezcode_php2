<?php
namespace App\Models;

use App\Models\BaseModel;

class Comments extends BaseModel
{
    protected $table = 'comment';

    public function getComment(){
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function insertComment($id,$content,$user_id,$course_id){
        $sql = "INSERT INTO $this->table VALUES(?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$content,$user_id,$course_id]);
    }
}

