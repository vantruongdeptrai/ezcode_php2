<?php
CONST BASE_URL = "http://localhost:8080/ezcode/";
const DBHOST = "localhost";
const DBNAME = "ezcode";
const USERNAME = "root";
const PASSWORD = "";

function redirect($key = "",$msg = "",$url ="") {
    $_SESSION[$key] = $msg;
    switch ($key) {
        case "errors":
            unset($_SESSION['success']);
            break;
        case "success":
            unset($_SESSION['errors']);
            break;
    }
    header('location: ' . BASE_URL . $url."?msg=".$key);die;
}
function route($url) {
    return BASE_URL.$url;
}
