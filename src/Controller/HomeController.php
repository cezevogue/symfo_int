<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/templating")
     */
    public function templating()
    {

        return $this->render('home/templating.html.twig', [

            'demain' => new \DateTime('+1day')
        ]);

    }


    /*
     * Faire une page avec un Hello world,
     * choisir son URL et la tester dans le navigateur
     *
     * passer votre nom comme variable au template
     * et changer le Hello world en Hello votre prenom
     */

    /**
     * @Route("/")
     */
    public function home()
    {

        return $this->render('home/home.html.twig', [
            'prenom'=>'cesaire'

        ]);

     }





}
