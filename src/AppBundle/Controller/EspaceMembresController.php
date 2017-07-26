<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 25/07/2017
 * Time: 13:36
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class EspaceMembresController extends Controller
{
    /**
     * @Route("/test/", name="acceuilTest")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('espaceMembres/layout.html.twig');
    }


    /**
     * @Route("/sortie/", name="em_sortie")
     */
    public function sortiesAction(Request $request)
    {
        return $this->render('espaceMembres/sorties.html.twig');
    }

    /**
     * @Route("/concours/", name="em_concours")
     */
    public function concoursAction(Request $request)
    {
        return $this->render('espaceMembres/concours.html.twig');
    }

    /**
     * @Route("/repetition/", name="em_repetition")
     */
    public function repetitionsAction(Request $request)
    {
        return $this->render('espaceMembres/repetitions.html.twig');
    }

    /**
     * @Route("/reunion/", name="em_reunion")
     */
    public function reunionsAction(Request $request)
    {
        return $this->render('espaceMembres/reunions.html.twig');
    }

    /**
     * @Route("/listeMembres/", name="em_listeMembres")
     */
    public function listeMembresAction(Request $request)
    {
        return $this->render('espaceMembres/listeMembres.html.twig');
    }

    /**
     * @Route("/profil/", name="em_profil")
     */
    public function profilAction(Request $request)
    {
        return $this->render('espaceMembres/profil.html.twig');
    }

    /**
     * @Route("/messagerie/", name="em_messagerie")
     */
    public function messagerieAction(Request $request)
    {
        return $this->render('espaceMembres/messagerie.html.twig');
    }

}