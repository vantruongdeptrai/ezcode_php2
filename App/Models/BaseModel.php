<?php
namespace App\Models;
use PDO;
class BaseModel {
    protected $pdo = null ;
    protected $sta = null ;
    protected $sql = '' ;
    public function __construct(){
        $this->pdo = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME,USERNAME,PASSWORD);
    }
    public function setQuery($sql)
    {
        $this->sql = $sql;
    }
    public function execute($options = array())
    {
        $this->sta = $this->pdo->prepare($this->sql);
        if ($options) {
            for ($i = 0; $i < count($options); $i++) {
                $this->sta->bindParam($i + 1, $options[$i]);
            }
        }
        $this->sta->execute();
        return $this->sta;
    }
    
    function loadAllRows($options = array())
    {
        if (!$options) {
            if (!$result = $this->execute())
                return false;
        } else {
            if (!$result = $this->execute($options))
                return false;
        }
        return $result->fetchAll();
    }
    function loadRow($option = array())
    {
        if (!$option) {
            if (!$result = $this->execute($option))
                return false;
        } else {
            if (!$result = $this->execute($option))
                return false;
        }
        return $result->fetch(PDO::FETCH_ASSOC);
    }
}

