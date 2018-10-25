<?php 

namespace Core;

class Config{

    /**
     * @var setting[] empty array which hold item from Config Class
     * @var _instance static property to hold the instance of the class Config
     * @param getInstance instance of Config class and @return @var _instance
     */

    private $settings = [];
    private static $_instance;
    
    public static function getInstance($file){

        if(is_null(self::$_instance)){
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }
    /**
     * constructor will take the path name @var file
     */
    public function __construct($file){

       $this->settings = require($file);

    }

    /**
     * @param get get the key of the array
     * @var key of the array
     * @var settings empty array to hold data from the config file
     */

    public function get($key){

        if(!isset($this->settings[$key])){
            return null;
        }
        return $this->settings[$key];
    }
}