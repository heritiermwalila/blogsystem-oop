<?php

use \Core\Config;
use \Core\Database\Database;
use \Core\Database\MysqlDatabase;

class App{

   
    public $title = "My blog";
    private $db_instance;

    private static $_instance;

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App;

        }
        return self::$_instance;
    }

    public static function load(){
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();

        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }

    public function getTable($name){

        $class_name = 'App\Table\\' . ucfirst($name) . 'Table';

        return new $class_name($this->getDb());
    }

    public  function getDb(){
        $config = Config::getInstance(ROOT . '/config/config.php');

        if(is_null($this->db_instance)){

            $this->db_instance = new MysqlDatabase();
        }

        return $this->db_instance;
    }

    

    

    
}