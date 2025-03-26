<?php

session_start();

use App\Controller\HomeController as Home;
use App\Controller\UserController;

include "vendor/autoload.php";

$userCtl = new UserController();
$homeCtl = new Home();

$actions = ["actionClient", "homeAction", "reservationAction", "vehiculeAction"];


try{
    // si "$_GET" est vide c'es OK
    // Sinon ('$_get' pas vide) || , test si 'array_key' a une valeur se trouvant dans le tab '$actions'
    if( empty($_GET) || in_array( (array_keys($_GET)[0]), $actions ) ){
        $homeCtl->home();
        $userCtl->actionUser();
    }else{
        throw new \Exception("Cette requête n'existe pas");
    }
    

}catch(Exception $e){
    $userCtl->render("err", ["erreur" => $e->getMessage()]);
}