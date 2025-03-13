<?php

class User
{

    // Attributs de class User 
    private $id;
    private $prenom;
    private $login;
    private $mdp;
    private $role;
    private $adresse;
    private $cp;
    private $ville;
    private $dateInscription;

    // contructeur: invoqué au moment de l'instanciation(new Use(..., ..., ...))
    public function __construct($id, $prenom, $login,  $mdp,  $role,  $adresse,  $cp, $ville,  $dateInscription = null)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->ville = $ville;
        $this->login = $login;
        $this->mdp = $mdp;
        $this->role = $role;
        $this->adresse = $adresse;
        $this->cp = $cp;
        $this->dateInscription = $dateInscription;
    }

    // GETTER (accesseur)

    public function getId()
    {
        return $this->id;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getVille()
    {
        return $this->ville;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getMdp()
    {
        return $this->mdp;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getCp()
    {
        return $this->cp;
    }

    public function getDateInscription()
    {
        return $this->dateInscription;
    }

    // SETTER (mutateur)

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    public function setVille($ville): void
    {
        $this->ville = $ville;
    }

    public function setLogin($login): void
    {
        $this->login = $login;
    }

    public function setMdp($mdp): void
    {
        $this->mdp = $mdp;
    }

    public function setRole($role): void
    {
        $this->role = $role;
    }

    public function setAdresse($adresse): void
    {
        $this->adresse = $adresse;
    }

    public function setCp($cp): void
    {
        $this->cp = $cp;
    }

    public function setDateInscription($dateInscription): void
    {
        $this->dateInscription = $dateInscription;
    }
}
