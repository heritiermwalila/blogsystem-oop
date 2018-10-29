<?php

$categoryTable = App::getInstance()->getTable('category')->all();


?>

<div class="container">
    <div class="row">
    <a href="?p=category.add" class="btn btn-success">Add category</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categoryTable as $category) :?>
                    <tr>
                        <td><?=$category->id?></td>
                        <td><?=$category->name?></td>
                        <td>
                            <a href="?p=catedit&id=<?=$category->id?>" class="btn btn-primary">Edit</a>
                            <form action="?p=categories.delete" method="POST" style="display:inline">
                                <input type="hidden" name="id" value="<?=$category->id?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>  