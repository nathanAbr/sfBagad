<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $listeEvenement[] = ['date_debut'=>date('Y-m-d h:i:s', strtotime('2017-01-05 09:00:00')),'date_fin'=>date('Y-m-d h:i:s', strtotime('2017-01-05 18:00:00')), 'lieu'=>'45 rue desz colombes', 'cp'=>'44 596', 'ville'=>'Nantes', 'titre'=>'Touch my tralala', 'description'=>'Do you want to touch my ball board with a cuire moustache jocket'];
        $listeEvenement[] = ['date_debut'=>date('Y-m-d h:i:s', strtotime('2017-01-05 09:00:00')),'date_fin'=>date('Y-m-d h:i:s', strtotime('2017-01-05 18:00:00')), 'lieu'=>'45 rue desz colombes', 'cp'=>'44 596', 'ville'=>'Nantes', 'titre'=>'Touch my tralala', 'description'=>'Do you want to touch my bool board with a cuire moustache jocket'];
        $listeEvenement[] = ['date_debut'=>date('Y-m-d h:i:s', strtotime('2017-01-05 09:00:00')),'date_fin'=>date('Y-m-d h:i:s', strtotime('2017-01-05 18:00:00')), 'lieu'=>'45 rue desz colombes', 'cp'=>'44 596', 'ville'=>'Nantes', 'titre'=>'Touch my tralala', 'description'=>'Do you want to touch my bool board with a cuire moustache jocket'];

        $listeEvenement2[] = ['date_debut'=>date('Y-m-d h:i:s', strtotime('2017-01-05 09:00:00')),'date_fin'=>date('Y-m-d h:i:s', strtotime('2017-01-05 18:00:00')), 'lieu'=>'45 rue desz colombes', 'cp'=>'44 596', 'ville'=>'Nantes', 'titre'=>'Touch my tralala lilili', 'description'=>'Do you want to touch my ball board with a cuire moustache jocket'];
        $listeEvenement2[] = ['date_debut'=>date('Y-m-d h:i:s', strtotime('2017-01-05 09:00:00')),'date_fin'=>date('Y-m-d h:i:s', strtotime('2017-01-05 18:00:00')), 'lieu'=>'45 rue desz colombes', 'cp'=>'44 596', 'ville'=>'Nantes', 'titre'=>'Touch my tralala', 'description'=>'Do you want to touch my bool board with a cuire moustache jocket'];
        $listeEvenement2[] = ['Repetition'=>['date_debut'=>date('Y-m-d h:i:s', strtotime('2017-01-05 09:00:00')),'date_fin'=>date('Y-m-d h:i:s', strtotime('2017-01-05 18:00:00')), 'lieu'=>'45 rue desz colombes', 'cp'=>'44 596', 'ville'=>'Nantes', 'titre'=>'Touch my tralala', 'description'=>'Do you want to touch my ball board with a cuire moustache jocket', 'instrument'=>'Caisse'], 'Cours'=>['date_debut'=>date('Y-m-d h:i:s', strtotime('2017-01-05 09:00:00')),'date_fin'=>date('Y-m-d h:i:s', strtotime('2017-01-05 18:00:00')), 'lieu'=>'45 rue desz colombes', 'cp'=>'44 596', 'ville'=>'Nantes', 'titre'=>'Touch my tralala', 'description'=>'Do you want to touch my ball board with a cuire moustache jocket', 'instrument'=>'caisse']];

        return $this->render('public/accueil.html.twig', array('listeEvenements'=>$listeEvenement, 'listeEvenement2'=>$listeEvenement2));
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
    /**
     * @Route("/login", name="login")
     */
    public function loginFormAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('public/espaceMembres.html.twig');
    }

    /**
     * @Route("/bagadig", name="bagadig")
     */
    public function bagadigAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('public/bagadig.html.twig');
    }
}
