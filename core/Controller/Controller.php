<?php
namespace Core\Controller;


class Controller{

    protected $viewPath;
    protected $template;

    protected function render($view, $vars = []){
        ob_start();
        extract($vars);

       require($this->viewPath . str_replace('.', '/', $view) . '.php');

       $content = ob_get_clean();

       require($this->viewPath . 'templates/' . $this->template . '.php');

    }

    protected function notFound(){
        header('HTTP/1.0 Not Found');
        header('Location:index.php?p=404');
    }

    public function setTitle($name){

        $this->title = $name;

        return $this->title;
    }

    protected function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('Access Denied...');
    }
    
}