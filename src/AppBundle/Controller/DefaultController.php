<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('public/layout.html.twig');
    }
    /**
     * @Route("/evenements", name="evenements")
     */
    public function evenementsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('public/evenements.html.twig');
    }
    /**
     * @Route("/palmares", name="palmares")
     */
    public function palmaresAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('public/palmares.html.twig');
    }

}
