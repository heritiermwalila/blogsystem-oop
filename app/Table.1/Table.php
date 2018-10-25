<?php
namespace App\Table;
use App\App;

class Table{

    protected static $table;

    public static function getTable(){

        if(static::$table === null){

            static::$table = get_called_class();
            
        }
        
        return static::$table;
    }

    public static function all(){
        return App::getDb()->query(
        "SELECT * FROM " . static::getTable(), get_called_class());
    }

    public static function find($id){

        return App::getDb()->prepare(
            "SELECT * FROM " . static::getTable() . " WHERE id=? ", [$id], 
                 get_called_class(), true);

    }

    public static function query($stmt, $attributes = null){

        if($attributes){

            return App::getDb()->prepare($stmt, $attributes, get_called_class());
            
        }else{
            return App::getDb()->query($stmt, get_called_class());
            
        }

    }


    public function __get($key){

        $method = 'get' . ucfirst($key);

        $this->$key = $this->$method();

        return $this->$key;
    }




}