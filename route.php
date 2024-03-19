<?php

use App\Controllers\CategoriesController;
use App\Controllers\CoursesController;
use App\Controllers\HomeController;
use Phroute\Phroute\RouteCollector;

$url = isset($_GET['url']) ? $_GET['url'] : '/';
$router = new RouteCollector();

$router->filter('auth',function(){
    if(!isset($_SESSION['user'])){
        header("location:/login");
        return false;
    }
});

$router->get('/homeAdmin',[HomeController::class,'homeAdmin']);
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
        $router->get('/list',[CoursesController::class,'listCategories']);
        $router->get('/form-add',[CoursesController::class,'formAddCourses']);
        $router->post('/add',[CoursesController::class,'addCourses']);
        $router->get('/form-courses/{id}',[CoursesController::class,'editCourse']);
        $router->post('/update-courses/{id}',[CoursesController::class,'updateCourses']);
        $router->get('/delete-courses/{id}',[CoursesController::class,'deleteCourses']);
    });
});

$router->group(['prefix'=>'user'],function($router){
    $router->get('/home',[HomeController::class,'home']);
});
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);


