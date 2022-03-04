<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PortofolioController extends AbstractController
{
    /**
     * @Route("/portofolio", name="portofolio_index")
     */
    public function index(): Response
    {
        return $this->render('portofolio/index.html.twig', [
            'controller_name' => 'PortofolioController',
        ]);
    }
}
