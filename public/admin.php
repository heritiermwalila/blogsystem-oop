<?php
use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));

require ROOT . '/app/App.php';

App::load();

if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'home';
}

$app = App::getInstance();

$auth = new DBAuth($app->getDb());

if(! $auth->logged()){

    $app->forbidden();

}


ob_start();

if($page === 'home'){

    require ROOT . '/pages/admin/articles/index.php';

}elseif($page === 'category'){

    require ROOT . '/pages/admin/articles/categories.php';

}elseif($page === 'edit'){

    require ROOT . '/pages/admin/articles/edit.php';
    
}elseif($page === '404'){
    
    require ROOT . '/pages/404.php';
}


$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';