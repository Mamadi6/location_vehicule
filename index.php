<?php 

session_start();

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


// $x = 10;
// $y = 0;

// $t = [10, 20];

// try{
//     echo $x / $y;
   
//     if( $y >= count($t) ){
//         throw new Exception(" y trop grnad que la taille du tableau");
//     }

//     echo $t[$y];

// }catch(Exception $e){
//     echo "excep";
// }catch(Throwable $e){
//     echo "erreur " . $e->getMessage();
// }