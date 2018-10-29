<?php
namespace App\Table;
use Core\Table\Table;

class PostTable extends Table{

    protected $table = 'posts';

    /**
     * get last post item 
     * @return array
     */
    public function last(){

        return $this->query(
            "SELECT posts.id AS postId, posts.title, posts.content, categories.id, categories.name
            FROM posts
            LEFT JOIN categories ON category_id = categories.id
            ORDER BY posts.id DESC");
        
    }

    public function getLastByCategory($id){
        return self::query("SELECT posts.id AS postId, posts.title, posts.content, categories.id AS catId, categories.name FROM " . $this->table . " LEFT JOIN categories ON category_id = categories.id WHERE categories.id=? ", [$id]);
    }

    
    
    

    

}