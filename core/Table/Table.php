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
    public function update($id, $fields){

        $sql_parts = [];
        $attributes = [];

        foreach($fields as $key => $value){
            $sql_parts[] = "$key = ? ";
            $attributes[] = $value;

        }
        $attributes[] = $id;
        $sql_part = implode(', ', $sql_parts); 
        
        return $this->query("UPDATE " . $this->table . " SET $sql_part WHERE id=?", $attributes, true);
        
    }
    public function create($fields){

        $sql_parts = [];
        

        foreach($fields as $key => $value){
            $sql_parts[] = "$key = ? ";
            $attributes[] = $value;

        }
        
        $sql_part = implode(', ', $sql_parts); 
        
        return $this->query("INSERT INTO " . $this->table . " SET $sql_part ", $attributes, true);
        
    }

    public function ext($key, $value){
        $records = $this->all();
        $return = [];
        foreach($records as $v){
            $return[$v->$key] = $v->$value;
        }

        return $return;
    }

    public  function query($stmt, $attr = null, $one = false){

        if($attr){

            //$class_name = str_replace('Table', 'Entity', get_class($this));

            return $this->db->prepare($stmt, $attr, str_replace('Table', 'Entity', get_class($this)), $one);


        }else{
            return $this->db->query($stmt, str_replace('Table', 'Entity', get_class($this)), $one);
        }

    }

    public function delete($id){
            return $this->query('DELETE FROM ' .$this->table . ' WHERE id=?', [$id], true);
    }

    
}