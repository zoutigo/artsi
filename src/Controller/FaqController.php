<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FaqController extends AbstractController
{

       /**
     * @Route("/faq", name="faq")
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('faq/index.html.twig', [
            'controller_name' => 'FaqController',
            'categories'=>$categoryRepository->findAll(),
            'parentPage'=>'home',
            'ancestorPage'=>'ancestor',
        ]);
    }
  

    /**
     * @Route("/faq/{slug}", name="faq-category")
     */
    public function faq_category(
        Category $category,
        CategoryRepository $categoryRepository,
         Request $request,
         string $slug
         ): Response
    {


        return $this->render('faq/category.html.twig', [
            'controller_name' => 'FaqController',
            'category'=>$category,
            // 'category'=>$categoryRepository->findOneBySlug($slug),
            'parentPage'=>'faq',
            'current_Page'=>$category->getName(),
            'ancestorPage'=>'home',
        ]);
    }

   
}
