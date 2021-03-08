<?php

namespace App\Controller;

use App\Entity\Articles;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
    	$donnees = $this->getDoctrine()->getRepository(Articles::class)->findBy([],['created_at'=>'desc']);
    	$articles = $paginator->paginate(
    		$donnees, //On passe les données
    		$request->query->getInt('page',1), //Numéro de la page en cours, 1 par défaut
    		1
    	);
    	//dd($articles);
        return $this->render('articles/index.html.twig', [
            'articles' => $articles,
        ]);
    }
	/**
	 * @Route("/{slug}", name="article")
	*/
	public function article($slug){
		// On récupère l'article correspondant au slug
    $article = $this->getDoctrine()->getRepository(Articles::class)->findOneBy(['slug' => $slug]);
    if(!$article){
        // Si aucun article n'est trouvé, nous créons une exception
        throw $this->createNotFoundException('L\'article n\'existe pas');
    }
    // Si l'article existe nous envoyons les données à la vue
    return $this->render('articles/article.html.twig', compact('article'));

	}
}
