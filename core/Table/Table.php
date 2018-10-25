<?php

namespace Core\Table;
use Core\Database\Database;
use Core\Database\MysqlDatabase;

class Table{

    protected $table;
    protected $db;

    public function __construct(MysqlDatabase $db){

        $this->db = $db;

        if(is_null($this->table)){

            $explode = explode('\\', get_class($this));
    
            $lastIndex = end($explode);
            $shiftLastIndex = str_replace('Table', '', $lastIndex);
            $this->table = strtolower($shiftLastIndex);

        }
    }

    public function all(){

        return $this->query("SELECT * FROM " .$this->table);

    }

    public function find($id){
    return $this->query("SELECT * FROM " . $this->table. " WHERE id=?", [$id], true);

    }

    public  function query($stmt, $attr = null, $one = false){

        if($attr){

            //$class_name = str_replace('Table', 'Entity', get_class($this));

            return $this->db->prepare($stmt, $attr, str_replace('Table', 'Entity', get_class($this)), $one);


        }else{
            return $this->db->query($stmt, str_replace('Table', 'Entity', get_class($this)), $one);
        }

    }

    
}