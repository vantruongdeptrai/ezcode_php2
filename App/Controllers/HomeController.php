<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    protected $view;
    public function __construct(){
        $this->view = new BaseController();     
    }
    public function home(){
        $dir = "User.home";
        $data = [];
        $this->view->render($dir,$data);
    }
    public function homeAdmin(){
        $dir = "Admin.layouts.admin";
        $data = [];
        $this->view->render($dir,$data);
    }
}