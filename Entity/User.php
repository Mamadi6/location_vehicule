<?php

class User
{

    private int $id;
    private string $prenom;
    private string $nom;
    private string $login;
    private string $mdp;
    private string $role;
    private string $adresse;
    private int $cp;
    private string $dateInscription;

    public function __construct(int $id, string $prenom, string $nom, string $login, string $mdp, string $role, string $adresse, int $cp, string $dateInscription)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->login = $login;
        $this->mdp = $mdp;
        $this->role = $role;
        $this->adresse = $adresse;
        $this->cp = $cp;
        $this->dateInscription = $dateInscription;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getMdp(): string
    {
        return $this->mdp;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    public function getCp(): int
    {
        return $this->cp;
    }

    public function getDateInscription(): string
    {
        return $this->dateInscription;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function setMdp(string $mdp): void
    {
        $this->mdp = $mdp;
    }

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

    public function setCp(int $cp): void
    {
        $this->cp = $cp;
    }

    public function setDateInscription(string $dateInscription): void
    {
        $this->dateInscription = $dateInscription;
    }
}
