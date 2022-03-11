<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog_index")
     */
    public function index(
        ArticleRepository $articleRepository,
        PaginatorInterface $paginator,
        Request $request
        
        ): Response
    {
        $data = $articleRepository->findAllPublished();
        $articles = $paginator->paginate(
            $data,
            $request->query->getInt('page',1),
            6
        );
      

        return $this->render('blog/index.html.twig', [
            'articles' => $articles,
            'numberPages'=>count($data)/6,
            'controller_name' => 'BlogController',
            'parentPage'=>'home'
            
        ]);
    }
    /**
     * @Route("/blog/{slug}", name="blog_article")
     */
    public function article(Article $article): Response
    {
      

        return $this->render('blog/article.html.twig', [
            'controller_name' => 'BlogController',
            'article'=>$article,
            'parentPage'=>'blog_index',
            'ancestorPage'=>'home'
        ]);
    }
}
