<?php
namespace App\Controllers;
use App\Models\Courses;
use App\Controllers\BaseController;
class ChartController extends BaseController
{
    protected $coursesModel;
    public function __construct()
    {
        $this->coursesModel = new Courses();
    }

    public function chart(){
        $dir='Statistics.list';
        $total_register = $this->coursesModel->getAllCourses();
        return $this->render($dir,compact('total_register'));
    }
    
}