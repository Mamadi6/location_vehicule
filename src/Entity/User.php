<?php

namespace App\Entity;

class User
{

    private $id;
    private $prenom;
    private $nom;
    private $login;
    private $mdp;
    private $role = "CLIENT";
    private $adresse;
    private $cp;
    private $ville;
    private $dateInscription;

    public function __construct($data = [])
    {
        foreach ($data as $cle => $valeur) {
            $methode = "set" . ucfirst($cle);

            if (method_exists($this, $methode)) {
                $this->$methode($valeur);
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getCp()
    {
        return $this->cp;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    public function setLogin($login): void
    {
        $this->login = $login;
    }

    public function setMdp($mdp): void
    {
        $this->mdp = $mdp;
    }

    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    public function setCp($cp): void
    {
        $this->cp = $cp;
    }

    public function setVille($ville): void
    {
        $this->ville = $ville;
    }

    public function setDateInscription($dateInscription): void
    {
        $this->dateInscription = $dateInscription;
    }
}
