<?php
namespace App\Models;
use PDO;
class BaseModel {
    // kết nối cơ sở dữ liệu
    public function getConnect(){
        $connect = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME,USERNAME,PASSWORD);
        return $connect;
    }
    //hàm truy vấn
    public function getData($query){
        $conn = $this->getConnect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getDataByID($query){
        $conn = $this->getConnect();
        $stmt = $conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }
}

