<?php

namespace App\Service;


class TestService
{
    /**
     *@var string
     */
    private $nom;


    public function __construct()
    {
        $this->nom = "Bienvenu !";
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }
}
