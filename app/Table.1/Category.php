<?php
namespace App\Table;
use App\App;
use App\Table\Table;

class Category extends Table{

    protected static $table = 'categories';

    

    public function getUrl(){

        return 'index.php?p=categories&id='. $this->id;
    }

   

    

}