<?php

use Core\HTML\Form;

$category  = App::getInstance()->getTable('category');

if(!empty($_POST)){
    $result = $category->delete($_POST['id']);

    if($result){ 

        header('Location: admin.php');
    }


}
