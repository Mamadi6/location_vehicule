<?php 


class HomeController extends ControllerAbstract{




    public function homeAction(){

        $vehiculeMdl = new VehiculeModel();

        if( empty($_GET) ){
            $vehicules = $vehiculeMdl->vehicules();
            include ("Vue/home.phtml");

        }else if( isset($_GET["homeAction"]) ){
            extract($_GET);

            switch( $homeAction ){
                case "detail":
                    $vehicule = $vehiculeMdl->show($id);
                    include("Vue/showDetailVeh.phtml");
                    // include("Vue/reservation/new.phtml");
                    break;

                
            }
        }
    }

}