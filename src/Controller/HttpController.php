<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/http")
 */
class HttpController extends AbstractController
{
    /**
     * @Route("/", name="http")
     */
    public function index(): Response
    {
        return $this->render('http/index.html.twig', [
            'controller_name' => 'HttpController',
        ]);
    }

    /**
     * on peut utiliser un objet REquest grace à Request $request en paremètre de la méthode.
     * on parle d'injection de dépendance
     *
     *
     * @Route("/requete")
     */
    public function requete(Request $request)
    {
        // http://127.0.0.1:8000/http/requete?nom=desaulle&prenom=cesaire
        dump($_GET);

        //$request->query contient une surcouche à $_GET,
        // sa méthode all() retourne tout le contenu de $_GET
        dump($request->query->all());

        //echo $_GET['prenom'];
        //echo $request->query->get('prenom');

        //echo $_GET['surnom'];  undefined index surnom

        // pas d'eereur si la clé n'existe pas
        echo $request->query->get('surnom') . '<br>';
        echo $request->query->get('surnom', 'Cez');

        // isset($_GET['surnom']);
        dump($request->query->has('surnom'));

        // si la page a été appelée en POST
        if ($request->isMethod('POST')):

            // $request->request est une surcouche de $_POST qui contient les mêmes méthodes que $request->query

            dump($request->request->all());


        endif;


        return $this->render('http/requete.html.twig');
    }


    /**
     * @Route("/reponse")
     */
    public function reponse(Request $request)
    {
        // http://127.0.0.1:8000/http/reponse?type=text

        $type = $request->query->get('type');

        if ($type == 'text'):

            $reponse = new Response('Contenu en texte brut');

            return $reponse;

        elseif ($type == 'json'):
            // http://127.0.0.1:8000/http/reponse?type=json
            $data = [
                'nom' => 'desaulle',
                'prenom' => 'cesaire'
            ];

            //return new Response(json_encode($data));

            return new JsonResponse($data);

        elseif ($type == 'notfound'):
            // http://127.0.0.1:8000/http/reponse?type=notfound

            //pour renvoyez une page 404, on jete cette Exception


            throw new NotFoundHttpException();

        endif;


        // ici c'est un objet RESPONSE qui est renvoyé, contenant le HTML produit par le template

        return $this->render('http/reponse.html.twig');

    }


}
