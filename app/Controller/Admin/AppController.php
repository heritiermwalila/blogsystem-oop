<?php 

namespace App\Controller\Admin;
use App\Controller\AppController as AppContr;
use App;

class AppController extends AppContr{

    

    protected $template = 'default';

    public function __construct(){

        $this->viewPath = ROOT .  '/app/views/';

    }

    protected function loadModel($model_name){

        $this->$model_name = App::getInstance()->getTable($model_name);

    }
}