<?php

$posts = App::getInstance()->getTable('post')->all();

?>

<h1>My Dashboard</h1>

<div class="card">
  <div class="card-header">
    List of posts
  </div>
  <div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php foreach($posts as $post) :?>
            <tr>
                <td><?=$post->id?></td>
                <td><?=$post->title?></td>
                <td><a href="admin.php?p=edit&id=<?=$post->id;?>" class="btn btn-primary">Edit</a></td>
            </tr>
        <?php endforeach;?>
    </table>
  </div>
</div>