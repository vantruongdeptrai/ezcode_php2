<?php
namespace App\Controllers;
use App\Models\Users;
class UsersController extends BaseController
{
    protected $userModel;
    public function __construct(){
        $this->userModel = new Users ();
    }
    public function listUser(){
        $users = $this->userModel->listUsers();
        $dir = "Users.list";
        return $this->render($dir,compact('users'));
    }
}
