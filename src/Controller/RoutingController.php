<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class RoutingController
 *
 * L'annotation de route mise au dessus de la classe défini un préfixe pour les urls des routes définis dans la classe
 *
 * @Route("/routing")
 */
class RoutingController extends AbstractController
{
    /**
     * ici l'url pour acceder à l'index.html.twig est /routing
     *
     * @Route("/", name="routing")
     */
    public function index(): Response
    {
        return $this->render('routing/index.html.twig', [
            'controller_name' => 'RoutingController',
        ]);
    }

    /**
     * {qui} est une partie variable de l'url
     * je saisi /routing/bonjour/cesaire
     * qui vaudra 'cesaire'
     *
     *
     * @Route("/bonjour/{qui}")
     */
    public function bonjour($qui)
    {

        return $this->render('routing/bonjour.html.twig',[
            'prenom'=>$qui
        ]);

    }

    /**
     * S'il il n'y a rien derriere le salut, $qui vaudra par défaut  "à toi"
     *
     *
    * @Route("/salut/{qui}", defaults={"qui": "à toi"})
    */
    public function salut($qui)
    {

        return $this->render('routing/bonjour.html.twig',[
            'prenom'=>$qui
        ]);

    }

    /**
     * route avec 2 parties variables dont une optionnelle
     *
     *
     * @Route("/coucou/{prenom}-{nom}", defaults={"nom": ""})
     */
    public function coucou($prenom, $nom)
    {
        $qui= $prenom.' '.$nom;
        return $this->render('routing/bonjour.html.twig',[
            'prenom'=>$qui
        ]);

    }

    /**
     *
     * id doit être un nombre (expression régulière \d+)
     *
     * @Route("/hi/{id}", requirements={"id": "\d+"} )
     */
    public function hi($id)
    {

        return $this->render('routing/bonjour.html.twig',[
            'prenom'=>$id
        ]);

    }










}
