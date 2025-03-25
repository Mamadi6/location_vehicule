<?php

namespace App\Controller;

use App\Model\VehiculeModel;

class HomeController extends AbstractController{

    public function home(){

        $vehMdl = new VehiculeModel();

        if( empty($_GET) ){
            $cars = $vehMdl->findAll(); 
            $this->render("home", ["vehicules" => $cars]);
        }

    }

}