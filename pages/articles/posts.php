<?php

$app = App::getInstance();
$table = $app->getTable('post');
$post = $table->find($_GET['id']);

/**
 * category
 */

 $category = App::getInstance()->getTable('category')->find($post->category_id)


?>

<h4><?= $post->title;?></h4>
<p><em><?=$category->name;?></em></p>
<p><?= $post->content;?></p>