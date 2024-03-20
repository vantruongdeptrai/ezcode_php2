<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    // protected $view;
    // public function __construct(){
    //     $this->view = new BaseController();     
    // }
    public function home(){
        $dir = "home";
        $data = [];
        return $this->renderView($dir,$data);
    }
}