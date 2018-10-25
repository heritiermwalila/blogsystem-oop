<div class="container">
    <div class="row">
        <div class="col-md-9">
           <?php foreach(App::getInstance()->getTable('post')->last() as $post) :?>

            <h4><a href="<?= $post->getUrl();?>"><?=$post->title?></a></h4>
            <p><em><?=$post->name;?></em></p>
            <p><?= $post->extrait;?></p>

            <?php endforeach;?>
        </div>
        <div class="col-md-3">
            <ul>
                <?php foreach(App::getInstance()->getTable('category')->all() as $category) :?>
                    <li><a href="<?=$category->getUrl();?>"><?=$category->name;?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>