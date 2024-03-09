<?php

use App\Controllers\CategoriesController;
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
});
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);


