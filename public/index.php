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

    require ROOT . '/pages/articles/index.php';

}elseif($page === 'category'){

    require ROOT . '/pages/articles/categories.php';

}elseif($page === 'post'){

    require ROOT . '/pages/articles/posts.php';
    
}elseif($page === '404'){
    
    require ROOT . '/pages/404.php';
}elseif($page === 'login'){
    
    require ROOT . '/pages/users/login.php';
}


$content = ob_get_clean();

require ROOT . '/pages/templates/default.php';