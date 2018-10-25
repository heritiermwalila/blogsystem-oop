<?php

namespace Core\Database;
use PDO;

class MysqlDatabase extends Database{

    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_name = 'pdo_db';
    private $pdo;


    public function __construct(){

        // $this->db_host = $db_host;
        // $this->db_user = $db_user;
        // $this->db_pass = $db_pass;
        // $this->db_name = $db_name;

        $this->getPDO();

    }

    private function getPDO(){

        if($this->pdo === null){
            
            $pdo = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_name, $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->pdo = $pdo;
        }

        return $this->pdo;
        

    }

    public function query($sql, $classname = null, $single = false){

        $sql = $this->getPDO()->query($sql);
        //$res = $sql->setFetchMode(PDO::FETCH_CLASS, $classname);

        if($classname === null){

            $res = $sql->fetchAll(PDO::FETCH_OBJ);
        }else{
            
            $res = $sql->fetchAll(PDO::FETCH_CLASS, $classname);
        }

        // if($single){
        //     $data = $sql->fetch();
        // }else{
            
        //     $data = $sql->fetchAll();
        // }

        return $res;
        
    }

    public function prepare($sql, $attr, $classname=null, $single = false){

        $sql = $this->getPDO()->prepare($sql);
        $sql->execute($attr);
        

        if($classname == null){
                $sql->setFetchMode(PDO::FETCH_OBJ);
        }else{
                $sql->setFetchMode(PDO::FETCH_CLASS, $classname);
        }

        if($single){
            $data = $sql->fetch();
        }else{
            
            $data = $sql->fetchAll();
        }


        return $data;
    }
}