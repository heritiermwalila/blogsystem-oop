<?php

$posts = App::getInstance()->getTable('post')->all();

?>
<a href="?p=categories">List categories</a>
<h1>My Dashboard</h1>
<p><a href="?p=post.add" class="btn btn-success">Add Post</a></p>
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
                <td><a href="admin.php?p=edit&id=<?=$post->id;?>" class="btn btn-primary">Edit</a></td></td>
                <td>
                <form action="admin.php?p=post.delete" style="display:inline" method="POST">
                <input type="hidden" name="id" value="<?=$post->id;?>">
                <button type="submit"  class="btn btn-danger">Delete</button></td>
                </form>
            </tr>
        <?php endforeach;?>
    </table>
  </div>
</div>