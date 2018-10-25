<?php
use Core\HTML\Form;
use Core\Auth\DBAuth;

if(!empty($_POST)){

    

    $app = App::getInstance();

    $auth = new DBAuth($app->getDb());

    if($auth->login($_POST['username'], $_POST['password'])){
        header('Location: admin.php');
    }

    
}

$form =  new Form($_POST);

?>

<div class="row">
    <div class="col-md-6 offset-md-3">
    <?php

    if(!$auth->login($_POST['username'], $_POST['password'])){ ?>

    <div class="alert alert-danger">
        Wrong credentials
    </div>

   <?php }
    ?>
        <div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <form method="POST">
        <div class="form-group">
            <?=$form->input('username', 'Your username', '', 'form-control');?>
            <?=$form->input('password', 'Your password', ['type'=>'password'], 'form-control');?>
            
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</div>

    </div>
</div>





