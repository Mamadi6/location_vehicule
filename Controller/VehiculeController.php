<?php

class VehiculeController{
    private $vehiculeMdl;

    public function __construct(){
        $this->vehiculeMdl = new VehiculeModel;
    }

    public function vehiculeAction(){
        $vehicule = new Vehicule(0,"","","","","");

        if(isset($_GET['actionVehi'])){
            extract($_GET);

            switch ($actionVehi) {
                case 'vehicule':

                    $vehicules =$this->vehiculeMdl->findAll();

                    include("Vue/vehicule/index.phtml");
                    break;
                
                case 'new':
                    
                    if(!empty($_POST['marque'])){
                        extract($_POST);
                        $vehicule = new Vehicule(0, $marque, $couleur, $description, $prix_journalier, $photo);

                        $this->vehiculeMdl->new($vehicule);

                        header("location: ?actionVehi=vehicule");
                        exit;
                    }

                    include("Vue/vehicule/new.phtml");
                    break;
                
                case 'update':
                    if(isset($_POST['marque'])){
                        extract($_POST);
                        $vehicule = new Vehicule($id, $marque, $couleur, $description, $prix_journalier, $photo);
                        $this->vehiculeMdl->update($vehicule);

                        header("location: ?actionVehi=vehicule");
                        exit;
                    }

                    $vehicule = $this->vehiculeMdl->show($id);
                    include("Vue/vehicule/new.phtml");
                    break;
                
                case 'show':

                    $vehicule = $this->vehiculeMdl->findById($id);
                    include("Vue/vehicule/show.phtml");
                    break;
                
                case 'delete':

                    $this->vehiculeMdl->delete($id);

                    header("location: ?actionVehi=vehicule");
                    exit;
                    break;
                
                default:
                    # code...
                    break;
            }
        }

    }



}