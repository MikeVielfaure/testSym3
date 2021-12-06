<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Pays;
use App\Repository\PaysRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\PaysService;
use App\Service\TestService;
use Symfony\Component\HttpFoundation\JsonResponse;

class AccueilController extends AbstractController
{

    /**
     * @var PaysService
     */
    private $paysService;

    /**
     * @Route("/", name="accueil")
     */
    public function index(PaysRepository $paysRepository, TestService $testService): Response
    {
        //$testService = $this->container->get('app_service.test_service');

        $testService->setNom("hello");
        $nom = $testService->getNom();
        $lesPays = $paysRepository->findAll();
        return $this->render('accueuil.html.twig', ["lesPays" => $lesPays, "nom" => $nom]);
    }

    /**
     * @Route("/test/{id}", name="accueil.test")
     */
    public function test($id)
    {
        //$testService = $this->container->get('app_service.test_service');
        return new JsonResponse($id);

        
    }

    /**
     * @Route("/test2", name="accueil.test2")
     */
    public function test2()
    {
        //$testService = $this->container->get('app_service.test_service');
        return new JsonResponse("ok");

        
    }

    /**
     * @Route ("/compte/valider/budget", name="accueil.valider.pays", methods={"GET","POST"})
     * @return Response
     */
    public function validerPays(PaysRepository $paysRepository, Request $request,  EntityManagerInterface $om): Response
    {
        $nouveauPays = $request->get("pays");
        $this->paysService = new PaysService($om);
        $this->paysService->createPays($nouveauPays);
        //dd($leCompte);
        //$this->denyAccessUnlessGranted('ROLE_USER');
        //$lesComptes = $user->getComptes();
        //$lesComptes = $compteRepository->findByIdutilisateur($user->getId());
        //dd($lesComptes[1]->getPourcentageBudgetDepense());
        return $this->redirectToRoute('accueil');
    }
}
