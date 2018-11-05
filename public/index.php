<?php

define('ROOT', dirname(__DIR__));

require ROOT . '/app/App.php';

App::load();

if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'home';
}


ob_start();

if($page === 'home'){

    $controller = new App\Controller\PostsController;
    $controller->index();

}elseif($page === 'posts.category'){
    $controller = new App\Controller\PostsController;
    $controller->category();

}elseif($page === 'post.show'){
    $controller = new App\Controller\PostsController;
    $controller->show();
    
}elseif($page === '404'){
    
    require ROOT . '/pages/404.php';
}elseif($page === 'login'){
    $controller = new App\Controller\UsersController;
    $controller->login();
}
