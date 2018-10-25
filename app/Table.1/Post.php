<?php
namespace App\Table;
use App\App;
use App\Table\Table;

class Post extends Table{

    protected static $table = 'posts';


    public static function getLast(){
        return self::query("SELECT posts.id AS postId, posts.title, posts.content, categories.id AS catId, categories.name FROM " . self::getTable() . " LEFT JOIN categories ON category_id = categories.id");
    }

    public static function getLastByCategory($id){
        return self::query("SELECT posts.id AS postId, posts.title, posts.content, categories.id AS catId, categories.name FROM " . self::getTable() . " LEFT JOIN categories ON category_id = categories.id WHERE categories.id=? ", [$id]);
    }

   


    public function getUrl(){

        return 'index.php?p=post&id='. $this->postId;
    }

    public function getExtrait(){

        $content = '<p>' . substr($this->content, 0, 120) . '...</p>';
        $content .= '<a href="' . $this->getURL(). '">Read more</a>';

        return $content;
    }

}