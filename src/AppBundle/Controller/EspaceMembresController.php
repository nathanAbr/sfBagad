<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 25/07/2017
 * Time: 13:36
 */

namespace AppBundle\Controller;
use AppBundle\Entity\Concours;
use AppBundle\Type\ConcoursType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;



class EspaceMembresController extends Controller
{
    /**
     * @Route("/membre/accueil/", name="membre_accueil")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('espaceMembres/layout.html.twig');
    }

    /**
     * @Route("/membre/listeMembres/", name="em_listeMembres")
     */
    public function listeMembresAction(Request $request)
    {
        return $this->render('espaceMembres/listeMembres.html.twig');
    }
    /**
     * @Route("/membre/profil/", name="em_profil")
     */
    public function profilAction(Request $request)
    {
        return $this->render('espaceMembres/profil.html.twig');
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
     * @Route("/admin/listeMembres/edit", name="em_listeMembres_edit")
     */
    public function listeMembresActionEdit(Request $request)
    {
        return $this->render('espaceMembres/listeMembres.html.twig');
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

    /**
     * @Route("/admin/profil/delete", name="admin_profil_delete")
     */
    public function profilActionSup(Request $request)
    {
        return $this->render('espaceMembres/profil.html.twig');
    }
    /**
     * @Route("/admin/profil/edit", name="em_profil_edit")
     */
    public function profilActionEdit(Request $request)
    {
        return $this->render('espaceMembres/profil.html.twig');
    }

    /*========================reunion===========================*/

}