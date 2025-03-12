<?php

spl_autoload_register(function($classe){
    $page = "Entity/" . $classe . ".php";

    if( file_exists($page) ){
        include $page;
    }
});


include "Model/ModelAbstract.php";
include "Model/UserModel.php";

include "Controller/UserController.php";


$userCtl = new UserController;

include_once "Vue/header.phtml";

$userCtl->userAction();

include_once "Vue/footer.phtml";