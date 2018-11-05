<?php

use Core\HTML\Form;

$postTable  = App::getInstance()->getTable('post');

$post = $postTable->find($_GET['id']);
$categories = App::getInstance()->getTable('category')->ext('id', 'name');

if(!empty($_POST)){
    $result = $postTable->update($_GET['id'], [
        'title'=>$_POST['title'],
        'content'=>$_POST['content'],
        'category_id'=>$_POST['category']
    ]);

    if($result){ ?>

    <div class="alert alert-success">Post has been updated...</div>

    <?php }


}


$form = new Form($post);
?>

<div class="row">
    <div class="col-md-9">
    <form method="POST">
        <?= $form->input('title', 'Post title', '', 'form-control');?>
        <?=$form->select('category', 'select category', 'form-control', $categories);?>
        <?= $form->input('content', 'Post content', ['type'=>'textarea'], 'form-control');?>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
    </div>
</div>