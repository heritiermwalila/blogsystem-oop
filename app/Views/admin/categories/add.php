<?php

use Core\HTML\Form;

$category  = App::getInstance()->getTable('category');


if(!empty($_POST)){
    $result = $category->create([
        'name'=>$_POST['name']
    ]);

    if($result){ ?>

    <?php header('Location: admin.php?p=catedit&id=' . App::getInstance()->getDb()->lastInsertId()) ;?>

    <?php }


}


$form = new Form($_POST);
?>

<div class="row">
    <div class="col-md-9">
    <form method="POST">
        <?= $form->input('name', 'Category name', '', 'form-control');?>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
    </div>
</div>