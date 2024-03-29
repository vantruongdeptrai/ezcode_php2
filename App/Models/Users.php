<?php
namespace App\Models;

use App\Models\BaseModel;

class Users extends BaseModel
{
    protected $table = 'users';

    public function listUsers(){
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows([]);
    }
    public function insertUsers($id,$username,$fullname,$email,$password,$dob,$avatar,$gender,$tel,$address,$role){
        $sql = "INSERT INTO $this->table VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$username,$fullname,$email,$password,$dob,$avatar,$gender,$tel,$address,$role]);
    }
    public function checkAccount($email,$password){
        $sql = "SELECT * FROM $this->table WHERE email=? AND password=?";
        $this->setQuery($sql);
        return $this->loadRow([$email,$password]);
    }
    public function checkEmail($email){
        $sql = "SELECT * FROM $this->table WHERE email=?";
        $this->setQuery($sql);
        return $this->loadRow([$email]);
    }
}

