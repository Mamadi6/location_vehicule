<?php

spl_autoload_register(function($classe){
    $page = "Entity/" . $classe . ".php";

    if( file_exists($page) ){
        include $page;
    }
});
