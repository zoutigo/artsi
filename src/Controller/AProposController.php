<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AProposController extends AbstractController
{
    /**
     * @Route("/apropos", name="a_propos")
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('a_propos/index.html.twig', [
            'controller_name' => 'AProposController',
            'manager'=> $userRepository->getManager(),
            'parentPage'=>'home',
            'ancestorPage'=>'ancestor',
        ]);
    }
}
