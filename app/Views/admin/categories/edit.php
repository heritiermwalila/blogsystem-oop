<?php

use Core\HTML\Form;

$category  = App::getInstance()->getTable('category');

$cat = $category->find($_GET['id']);

if(!empty($_POST)){
    $result = $category->update($_GET['id'], [
        'name'=>$_POST['name']
    ]);

    if($result){ ?>

    <div class="alert alert-success">Category has been updated...</div>

    <?php }


}


$form = new Form($cat);
?>

<div class="row">
    <div class="col-md-9">
    <form method="POST">
        <?= $form->input('name', 'Category name', '', 'form-control');?>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
    </div>
</div>