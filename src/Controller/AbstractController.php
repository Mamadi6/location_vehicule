<?php 

namespace App\Controller;

use Exception;

class AbstractController{

    public function render($vue, $data = []){
        $page = "Vue/" . $vue . ".phtml";

        if( !file_exists($page) ){
            throw new \Exception("Cette page $page n'existe pas");
        }

        ob_start();

        if( !empty($data) ){
            extract($data);
        }

        include $page;

        $content = ob_get_clean();

        include "Vue/template.phtml";
    }
}