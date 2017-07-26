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
     * @Route("/sorties/", name="sorties")
     */
    public function sortiesAction(Request $request)
    {
        return $this->render('espaceMembres/sorties.html.twig');
    }

    /**
     * @Route("/concours/", name="concours")
     */
    public function concoursAction(Request $request)
    {
        return $this->render('espaceMembres/concours.html.twig');
    }

    /**
     * @Route("/cours/", name="cours")
     */
    public function coursAction(Request $request)
    {
        return $this->render('espaceMembres/cours.html.twig');
    }

    /**
     * @Route("/reunions/", name="reunions")
     */
    public function reunionsAction(Request $request)
    {
        return $this->render('espaceMembres/reunions.html.twig');
    }

    /**
     * @Route("/listeMembres/", name="listeMembres")
     */
    public function listeMembresAction(Request $request)
    {
        return $this->render('espaceMembres/listeMembres.html.twig');
    }

}