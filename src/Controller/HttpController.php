<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
     * @Route("/requete")
     */
    public function requete()
    {

        return $this->render('http/requete.html.twig');
    }

}
