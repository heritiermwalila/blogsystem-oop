<?php

$category = App::getInstance()->getTable('category')->find($_GET['id']);


if($category == false){
    App::getInstance()->notFound();
}
//App::getInstance()->setTitle($category->name);
$posts = App::getInstance()->getTable('post')->getLastByCategory($_GET['id']);
$categories = App::getInstance()->getTable('category')->all();

?>

<div class="container">
    <h1><?=$category->name?></h1>
    <div class="row">
        <div class="col-md-9">
            <?php foreach($posts as $post) :?>
                <h4><a href="<?=$post->url;?>"><?= $post->title;?></a></h4>
                <p><em><?= $post->name?></em></p>
                <p><?= $post->extrait;?></p>
            <?php endforeach;?>
        </div>
        <div class="col-md-3">
            <ul>
            <?php foreach($categories as $category) :?>
                <li><a href="<?=$category->url;?>"><?= $category->name;?></a></li>
            <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>