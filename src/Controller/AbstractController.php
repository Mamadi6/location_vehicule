<?php 

namespace App\Controller;

class AbstractController{

    public function render($vue, $data = []){
        ob_start();

        if( !empty($data) ){
            extract($data);
        }

        include "Vue/" . $vue . ".phtml";

        $content = ob_get_clean();

        include "Vue/template.phtml";
    }
}