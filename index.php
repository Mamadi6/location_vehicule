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

$vehiculeCtl = new VehiculeController;


include_once "Vue/header.phtml";

$userCtl->userAction();

$vehiculeCtl->vehiculeAction();

include_once "Vue/footer.phtml";
