<?php
use App\Controllers\CategoriesController;
use Phroute\Phroute\RouteCollector;

$url = isset($_GET['url']) ? $_GET['url'] : '/';
$router = new RouteCollector();

/*request method: 
- get: kéo dữ liệu từ sv về
- post: đẩy dữ liệu lên sv (thêm mới/update)
- delete: xoá dữ liệu
- any: request nào cũng dùng được 

$route: '/', '/products'
$handler: hàm xử lý 
*/
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
        $router->get('/form-update',[CategoriesController::class,'editCategories']);
        $router->post('/update',[CategoriesController::class,'updateCategories']);
        $router->get('/delete',[CategoriesController::class,'deleteCategories']);
    });
});
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);


