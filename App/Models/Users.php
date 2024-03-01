<?php
namespace App\Models;

use App\Models\BaseModel;

class Categories extends BaseModel
{
    protected $table = "users";
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
    public function insertCategories($username, $fullname, $email, $password, $dob, $avatar, $gender, $tel, $address, $role)
    {
        $sql = "INSERT INTO " . $this->table . "(username,fullname,email,password,dob,avatar,gender,tel,address,role) VALUES('$username','$fullname','$email','$password','$dob','$avatar','$gender','$tel','$address','$role')";
        return $this->getData($sql);
    }
    public function updateCategories($id, $username, $fullname, $email, $password, $dob, $avatar, $gender, $tel, $address, $role)
    {
        $sql = "UPDATE " . $this->table . " SET username = '$username',fullname='$fullname',email='$email',password='$password',dob='$dob',avatar='$avatar',gender='$gender',tel='$tel',address='$address',role='$role' WHERE id =" . $id;
        return $this->getData($sql);
    }

}

