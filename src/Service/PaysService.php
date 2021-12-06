<?php

namespace App\Service;

use App\Entity\Pays;
use App\Repository\PaysRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;



class PaysService
{

    /**
     * @var PaysRepository
     */
    private $paysRepository;

    /**
     * @var Request
     */
    private $request;

    /**
     * @var EntityManagerInterface 
     */
    private $om;

    public function __construct(EntityManagerInterface $om)
    {
        $this->om = $om;
    }

    public function createPays(string $nouveauPays)
    {
        //$nouveauPays = $this->request->get("pays");
        //dd($request->get("montant"));
        $lePays = new Pays;
        $lePays->setLibelle($nouveauPays);
        $this->om->persist($lePays);
        $this->om->flush();
    }
}
