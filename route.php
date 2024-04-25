<?php

use App\Controllers\CategoriesController;
use App\Controllers\CommentsController;
use App\Controllers\CoursesController;
use App\Controllers\HomeController;
use App\Controllers\RattingController;
use App\Controllers\UserCourseController;
use App\Controllers\UsersController;
use App\Controllers\ChartController;

use Phroute\Phroute\RouteCollector;

$url = isset($_GET['url']) ? $_GET['url'] : '/';
$router = new RouteCollector();

$router->filter('auth',function(){
    if(!isset($_SESSION['user'])){
        header("location:/login");
        return false;
    }
});


$router->group(['prefix'=>'admin'],function($router){
    $router->group(['prefix'=>'/categories'],function($router){
        $router->get('/list',[CategoriesController::class,'listCategories']);
        $router->get('/form-add',[CategoriesController::class,'formAddCategories']);
        $router->post('/add',[CategoriesController::class,'addCategories']);
        $router->get('/form-update/{id}',[CategoriesController::class,'editCategories']);
        $router->post('/update-categories/{id}',[CategoriesController::class,'updateCategories']);
        $router->get('/delete-categories/{id}',[CategoriesController::class,'deleteCategories']);
    });
    $router->group(['prefix'=>'/courses'],function($router){
        $router->get('/list',[CoursesController::class,'listCourses']);
        $router->get('/form-add',[CoursesController::class,'formAddCourses']);
        $router->post('/add',[CoursesController::class,'addCourses']);
        $router->get('/form-courses/{id}',[CoursesController::class,'editCourse']);
        $router->post('/update-courses/{id}',[CoursesController::class,'updateCourses']);
        $router->get('/delete-courses/{id}',[CoursesController::class,'deleteCourses']);
    });
    $router->group(['prefix'=>'/user'],function($router){
        $router->get('/list',[UsersController::class,'listUser']);
    });
    $router->group(['prefix'=>'/comment'],function($router){
        $router->get('/list',[CommentsController::class,'listComment']);
    });
    $router->group(['prefix'=>'/ratting'],function($router){
        $router->get('/list',[RattingController::class,'listRatting']);
    });
    $router->group(['prefix'=>'/chart'],function($router){
        $router->get('/list',[ChartController::class,'chart']);
    });
});

$router->group(['prefix'=>'user'],function($router){
    $router->get('/home',[HomeController::class,'home']);
    $router->get('/register',[HomeController::class,'register']);
    $router->post('/post-register',[HomeController::class,'registerPost']);
    $router->get('/login',[HomeController::class,'login']);
    $router->get('/logout',[HomeController::class,'logout']);
    $router->post('/post-login',[HomeController::class,'loginPost']);
    $router->get('/list-course',[HomeController::class,'listCourse']);
    $router->post('/filter',[HomeController::class,'filter']);
    $router->get('/course-detail/{id}',[HomeController::class,'courseDetail']);
    $router->post('/search',[HomeController::class,'search']);
    $router->post('/ratting/{id}',[RattingController::class,'ratting']);
    $router->post('/comment/{id}',[CommentsController::class,'comment']);
    $router->get('/my-account',[UserCourseController::class,'myAccount']);
    $router->post('/join',[UserCourseController::class,'joinCourse']);
    $router->get('/update-info',[HomeController::class,'updateInfo']);
    $router->post('/post-info',[HomeController::class,'postInfo']);
});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);


