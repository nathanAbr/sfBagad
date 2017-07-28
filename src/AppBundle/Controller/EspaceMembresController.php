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
     * @Route("/membre/accueil/", name="em_accueil")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('espaceMembres/layout.html.twig');
    }
    /**
     * @Route("/admin/sortie/", name="em_sortie")
     */
    public function sortiesAction(Request $request)
    {
        return $this->render('espaceMembres/sorties.html.twig');
    }
    /**
     * @Route("/admin/concours/", name="em_concours")
     */
    public function concoursAction(Request $request)
    {
        return $this->render('espaceMembres/concours.html.twig');
    }
    /**
     * @Route("/admin/repetition/", name="em_repetition")
     */
    public function repetitionsAction(Request $request)
    {
        return $this->render('espaceMembres/repetitions.html.twig');
    }
    /**
     * @Route("/admin/reunion/", name="em_reunion")
     */
    public function reunionsAction(Request $request)
    {
        return $this->render('espaceMembres/reunions.html.twig');
    }
    /**
     * @Route("/membre/listeMembres/", name="em_listeMembres")
     */
    public function listeMembresAction(Request $request)
    {
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('espaceMembres/listeMembres.html.twig', array('users' => $users));
    }
    /**
     * @Route("/admin/messagerie/", name="em_messagerie")
     */
    public function messagerieAction(Request $request)
    {
        return $this->render('espaceMembres/messagerie.html.twig');
    }

                                /*========================listeMembres===========================*/


    /**
     * @Route("/admin/listeMembres/sup", name="em_listeMembres_sup")
     */
    public function listeMembresActionSup(Request $request)
    {
        return $this->render('espaceMembres/listeMembres.html.twig');
    }
    /**
     * @Route("/admin/listeMembres/{id}/edit", name="em_listeMembres_edit")
     */
    public function listeMembresActionEdit(Request $request, $id)
    {
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id'=>$id));

        $userManager ->updateUser($user, false);

        return $this->render('@FOSUser/Registration/register.html.twig', array('user' => $user));
    }
    /**
     * @Route("/membre/listeMembres/profil", name="em_listeMembres_profil")
     */
    public function listeMembresActionProfil(Request $request)
    {
        return $this->render('espaceMembres/listeMembres.html.twig');
    }
    /**
     * @Route("/admin/listeMembres/add", name="em_listeMembres_add")
     */
    public function listeMembresActionAdd(Request $request)
    {
        return $this->render('espaceMembres/listeMembres.html.twig');
    }

                     /*========================messagerie===========================*/
    /**
     * @Route("/admin/messagerie/sup", name="em_messagerie_sup")
     */
    public function messagerieSupActionSup(Request $request)
    {
        return $this->render('espaceMembres/messagerie.html.twig');
    }

                      /*========================sorties===========================*/


    /**
     * @Route("/admin/sortie/sup", name="em_sortie_sup")
     */
    public function sortieActionSup(Request $request)
    {
        return $this->render('espaceMembres/sorties.html.twig');
    }
    /**
     * @Route("/admin/sortie/edit", name="em_sortie_edit")
     */
    public function sortieActionEdit(Request $request)
    {
        return $this->render('espaceMembres/sorties.html.twig');
    }
    /**
     * @Route("/membre/sortie/profil", name="em_sortie_profil")
     */
    public function sortieActionProfil(Request $request)
    {
        return $this->render('espaceMembres/sorties.html.twig');
    }
    /**
     * @Route("/admin/sortie/add", name="em_sortie_add")
     */
    public function sortieActionAdd(Request $request)
    {
        return $this->render('espaceMembres/sorties.html.twig');
    }

    /*========================concours===========================*/


    /**
     * @Route("/admin/concours/sup", name="em_concours_sup")
     */
    public function concoursActionSup(Request $request)
    {
        return $this->render('espaceMembres/concours.html.twig');
    }
    /**
     * @Route("/admin/concours/edit", name="em_concours_edit")
     */
    public function concoursActionEdit(Request $request)
    {
        return $this->render('espaceMembres/concours.html.twig');
    }
    /**
     * @Route("/admin/concours/add", name="em_concours_add")
     */
    public function concoursActionAdd(Request $request)
    {
        return $this->render('espaceMembres/concours.html.twig');
    }

    /*========================repetition===========================*/

    /**
     * @Route("/admin/repetition/sup", name="em_repetition_sup")
     */
    public function repetitionActionSup(Request $request)
    {
        return $this->render('espaceMembres/repetitions.html.twig');
    }
    /**
     * @Route("/admin/repetition/edit", name="em_repetition_edit")
     */
    public function repetitionActionEdit(Request $request)
    {
        return $this->render('espaceMembres/repetitions.html.twig');
    }
    /**
     * @Route("/admin/repetition/add", name="em_repetition_add")
     */
    public function repetitionActionAdd(Request $request)
    {
        return $this->render('espaceMembres/repetitions.html.twig');
    }


    /*========================reunion===========================*/

    /**
     * @Route("/admin/reunion/sup", name="em_reunion_sup")
     */
    public function reunionActionSup(Request $request)
    {
        return $this->render('espaceMembres/reunions.html.twig');
    }
    /**
     * @Route("/admin/reunion/edit", name="em_reunion_edit")
     */
    public function reunionActionEdit(Request $request)
    {
        return $this->render('espaceMembres/reunions.html.twig');
    }
    /**
     * @Route("/admin/reunion/add", name="em_reunion_add")
     */
    public function reunionActionAdd(Request $request)
    {
        return $this->render('espaceMembres/reunions.html.twig');
    }
}