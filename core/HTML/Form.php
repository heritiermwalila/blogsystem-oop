<?php
namespace Core\HTML;

class Form{

    private  $tag = 'p';

    public function __construct($data = null){

        if(!empty($data)){
            return $data;
        }

    }

    public  function surround($html){

        return "<" . $this->tag . ">" . $html . "<" . $this->tag . ">";
    }

    public function getValue($value){
        if(isset($_POST[$value])){
            return $_POST[$value];
        }
    }

    private  function label($name){
        return "<label><strong>" . $name . "</strong></label>";
    }

    public  function input($name, $label, $options=[], $class=null, $placeholder=null){

        $type  = isset($options['type']) ? $options['type'] : 'text';

        $output = $this->surround(self::label($label) . '<input type="'.$type.'" name="'.$name.'" value="'. $this->getValue($name).'" class="'.$class.'"');

       return $output;
       

    }

    public  function submit($class=null, $value){

        return "<input type='submit' class=" . $class . " value=" .$value. ">";
    }

}