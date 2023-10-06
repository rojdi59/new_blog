<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VoirArticleController extends AbstractController
{
    #[Route('/voir/article/{id}', name: 'app_voir_article')]
    public function index(ArticleRepository $repoarticle,$id): Response
    {$article = $repoarticle -> find ($id);
        return $this->render('voir_article/index.html.twig', [
            'controller_name' => 'VoirArticleController',
            'article' => $article
        ]);
    }
}