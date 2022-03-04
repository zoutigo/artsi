<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServicesController extends AbstractController
{
    /**
     * @Route("/services/{slug}", 
     * name="services", 
     * methods={"GET"}, 
     * requirements={"slug": "professionnels|particuliers"})
     */
    public function index(string $slug='professionnels'): Response
    {
        return $this->render('services/index.html.twig', [
            'controller_name' => 'ServicesController',
        ]);
    }

}
