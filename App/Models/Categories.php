<?php
namespace App\Models;

use App\Models\BaseModel;

class Categories extends BaseModel
{
    protected $table = "categories";

    public function getAllCategories()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function getCategorieById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id= ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }
    public function insertCategories($id,$name,$description,$thumbnail,$status)
    {
        $sql = "INSERT INTO $this->table VALUES(?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$name,$description,$thumbnail,$status]);
    }
    public function updateCategories($id, $name, $description, $thumbnail, $status)
    {
        $sql = "UPDATE $this->table SET name=? , description = ?, thumbnail=?, status=? WHERE id = ?" ;
        $this->setQuery($sql);
        return $this->execute([$name,$description,$thumbnail,$status,$id]);
    }
    public function deleteCategories($id)
    {
        $sql = "UPDATE $this->table SET status='inactive' WHERE id=?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}

