<?php
namespace Core\HTML;

class Form{

    private  $tag = 'p';
    private $data;

    public function __construct($data = null){

        $this->data = $data;

    }

    public  function surround($html){

        return "<" . $this->tag . ">" . $html . "<" . $this->tag . ">";
    }

    public function getValue($index){

        if(is_object($this->data)){
            return $this->data->$index;
        }else{
            return isset($this->data[$index]) ? $this->data[$index] : null;
        }
        
    }

    private  function label($name){
        return "<label><strong>" . $name . "</strong></label>";
    }

    public  function input($name, $label, $options=[], $class=null, $placeholder=null, $data=null){

        $type  = isset($options['type']) ? $options['type'] : 'text';
        if($type === 'textarea'){
            $input = '<textarea name="'.$name.'" cols="10" rows="5" class="'.$class.'">' . $this->getValue($name) . '</textarea>';
        }else{

            $input = '<input type="'.$type.'" name="'.$name.'" value="'. $this->getValue($name).'" class="'.$class.'"';
        }

        $output = $this->surround(self::label($label) . ' ' . $input);

       return $output;
       

    }

    public function select($name, $label, $class=null, $data){

        $input = '<select name="'.$name.'" class="'.$class.'">';
        $attributes = '';
                
            foreach($data as $key=>$value){
                //if($key == $this->getValue($name)) $attributes =' selected';
                $input .= '<option value="'.$key. '" >';
                $input .= $value . '</option>';
            }
        $input .='</select>';

        return $this->surround(self::label($label) . $input);

    }

    

    public  function submit($class=null, $value){

        return "<input type='submit' class=" . $class . " value=" .$value. ">";
    }

}