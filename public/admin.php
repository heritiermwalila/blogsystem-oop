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
}elseif($page === 'post.add'){

    require ROOT . '/pages/admin/articles/add.php';
    
}elseif($page === 'post.delete'){

    require ROOT . '/pages/admin/articles/delete.php';
    
}elseif($page === 'categories'){

    require ROOT . '/pages/admin/categories/index.php';
    
}elseif($page === 'catedit'){

    require ROOT . '/pages/admin/categories/edit.php';
    
}elseif($page === 'categories.delete'){

    require ROOT . '/pages/admin/categories/delete.php';
    
}elseif($page === 'category.add'){

    require ROOT . '/pages/admin/categories/add.php';
    
}


$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';