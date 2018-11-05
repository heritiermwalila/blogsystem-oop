<?php 

namespace App\Controller;
use Core\Controller\Controller;
use App;

class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index(){
        $posts = $this->Post->last();
        $categories = $this->Category->all();

        $this->render('posts.index', compact('posts', 'categories'));
    }

    public function category(){

        $category = $this->Category->find($_GET['id']);

        if($category == false){
            $this->notFound();
        }
        //App::getInstance()->setTitle($category->name);
        $posts = $this->Post->getLastByCategory($_GET['id']);
        $categories = $this->Category->all();

        $this->render('posts.category', compact('posts', 'category', 'categories'));

    }

    public function show(){

        $app = App::getInstance();
        $table = $app->getTable('post');
        $post = $table->find($_GET['id']);

        /**
         * category
         */

        $category = App::getInstance()->getTable('category')->find($post->category_id);

        $this->render('posts.posts', compact('post', 'category'));

    }
}