<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\DependencyInjection\ContainerBuilder;


class IndexController extends Controller
{
    /**
     * @Route("/index", name="index")
     */
    public function index(): Response
    {
        //$container->setAlias('app_service.test_service', 'App\Service\TestService');

        $testService = $this->container->get('app_service.test_service');
        $nom = $testService->getNom();

        return $this->render('index/index.html.twig', [
            'nom' => $nom
        ]);
    }
}
