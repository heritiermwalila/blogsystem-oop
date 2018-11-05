<?php

namespace App\Entity;
use Core\Entity\Entity;

class PostEntity extends Entity{


    
    public function getUrl(){

        return 'index.php?p=post.show&id='. $this->postId;
    }

    public function getExtrait(){

        $content = '<p>' . substr($this->content, 0, 120) . '...</p>';
        $content .= '<a href="' . $this->getURL(). '">Read more</a>';

        return $content;
    }
}