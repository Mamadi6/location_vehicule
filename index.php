<?php 

spl_autoload_register(function($classe){
    $page = "Entity/" . $classe . ".php";

    if( file_exists($page) ){
        include $page;
    }else if( file_exists($page =  "Model/" . $classe . ".php") ){
        include $page;
    }else if( file_exists($page =  "Controller/" . $classe . ".php") ){
        include $page;
    }
});



$userCtl = new UserController;


include_once "Vue/header.phtml";

$userCtl->userAction();

include_once "Vue/footer.phtml";
