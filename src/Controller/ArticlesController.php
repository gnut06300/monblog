<?php

namespace App\Controller;

use App\Entity\Articles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/** 
*Class ArticlesController
*@package App\Controller
* @Route("/actualites", name="actualites_")
*/
class ArticlesController extends AbstractController
{
    /**
     * @Route("/", name="articles")
     */
    public function index(): Response
    {
    	$articles = $this->getDoctrine()->getRepository(Articles::class)->findAll();
    	//dd($articles);
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }
}
