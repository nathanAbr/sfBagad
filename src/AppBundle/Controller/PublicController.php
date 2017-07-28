<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 26/07/2017
 * Time: 13:34
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Evenement;
use AppBundle\Entity\Resultat;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Concours;
use AppBundle\Entity\Reunion;
use AppBundle\Entity\Session;
use AppBundle\Entity\Sortie;

use AppBundle\Type\ContactType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PublicController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, EntityManagerInterface $entityManager)
    {
        $evenementsImp = $entityManager->getRepository(Evenement::class)->findBy(array('visibilite'=>true, 'important'=>true), null, 3);
        $evenementsVis = $entityManager->getRepository(Evenement::class)->findBy(array('visibilite'=>true, 'important'=>false), array('dateAjout'=>'DESC'), 2);
        $palmares = $entityManager->getRepository(Resultat::class)->findOneByVisibilite(true, null, 1);

        dump($evenementsVis);

        return $this->render('public/accueil.html.twig', array('evenementsImportants'=>$evenementsImp, 'evenementsAutres'=>$evenementsVis, 'Palmares'=>$palmares));
    }

    /**
     * @Route("/evenement", name="evenements")
     */
    public function evenementsAction(Request $request)
    {
        return $this->render('public/evenements.html.twig');
    }

    /**
     * @Route("/palmares", name="palmares")
     */
    public function palmaresAction(Request $request, EntityManagerInterface $entityManager)
    {
        $palmares = $entityManager->getRepository(Resultat::class)->findByVisibilite(true);

        return $this->render('public/palmares.html.twig', array("listPalmares"=>$palmares));
    }

    /**
     * @Route("/dataPalmares", name="OncePalmares")
     */
    public function dataPalmaresAction(Request $request, EntityManagerInterface $entityManager){
        $palmares = $entityManager->getRepository(Resultat::class)->findOneById($_POST['id']);
        $object = new \stdClass();
        $object->titre = $palmares->getTitre();
        $object->description = $palmares->getDescription();
        return new Response(json_encode($object));
    }
    

    /**
     * @Route("/bagadig", name="bagadig")
     */
    public function bagadigAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('public/bagadig.html.twig');
    }

    /**
     * @Route("/dataEvent", name="dataEvent")
     */
    public function eventDataAction(EntityManagerInterface $entityManager){

        $start = $_GET['start'];
        $end = $_GET['end'];

        $reunions = $entityManager->getRepository(Reunion::class)->findByCurrentMonth($start, $end);
        $sorties = $entityManager->getRepository(Sortie::class)->findByCurrentMonth($start, $end);
        $concours = $entityManager->getRepository(Concours::class)->findByCurrentMonth($start, $end);
        $sessions = $entityManager->getRepository(Session::class)->findByCurrentMonth($start, $end);

        $evenements = [];

        foreach($reunions as $reunion){
            $evenement = new \stdClass();
            $evenement->start = $reunion['dateDebut']->format('Y-m-d H:i:s');
            $evenement->end = $reunion['dateFin']->format('Y-m-d H:i:s');
            $evenement->id = $reunion['id'];
            $evenement->url = '/evenement/'.$reunion['id'];
            $evenement->backgroundColor = 'blue';
            array_push($evenements, $evenement);
        }

        foreach($sorties as $sortie){
            $evenement = new \stdClass();
            $evenement->start = $sortie['dateDebut']->format('Y-m-d H:i:s');
            $evenement->end = $sortie['dateFin']->format('Y-m-d H:i:s');
            $evenement->id = $sortie['id'];
            $evenement->url = '/evenement/'.$sortie['id'];
            $evenement->backgroundColor = 'red';
            array_push($evenements, $evenement);
        }

        foreach($concours as $concour){
            $evenement = new \stdClass();
            $evenement->start = $concour['dateDebut']->format('Y-m-d H:i:s');
            $evenement->end = $concour['dateFin']->format('Y-m-d H:i:s');
            $evenement->id = $concour['id'];
            $evenement->url = '/evenement/'.$concour['id'];
            $evenement->backgroundColor = 'green';
            array_push($evenements, $evenement);
        }

        foreach($sessions as $session){
            $evenement = new \stdClass();
            $evenement->start = $session['dateDebut']->format('Y-m-d H:i:s');
            $evenement->end = $session['dateFin']->format('Y-m-d H:i:s');
            $evenement->id = $session['id'];
            $evenement->url = '/evenement/'.$session['id'];
            $evenement->backgroundColor = 'yellow';
            array_push($evenements, $evenement);
        }

        return new Response(json_encode($evenements));
    }

    /**
     * @Route("/evenement/{id}", name="dateEventDescr")
     */
    public function eventDataDescriptionAction(Request $request, EntityManagerInterface $entityManager, $id){
        $evenement = $entityManager->getRepository(Evenement::class)->findOneById($id);
        return $this->render('public/evenements.html.twig', array('evenement'=>$evenement));
    }

    /**
     *@Route("/contact", name="contact")
     */
    public function  contactAction(Request $request, EntityManagerInterface $em){
        $contact = new  Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->add('save', SubmitType::class, array(
            'label' => 'Envoyer',
            'attr'  => array('class' => 'btn btn-default pull-right')));
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $em->persist($contact);
            $em->flush();

            $this->container->get('session')->getFlashBag()->add('success', 'Votre message a bien été enregistré.');
            $this->container->get('session')->getFlashBag()->add('danger', 'Votre message n\'a pu être envoyé.');

            return $this->redirect($this->generateUrl('contact'));
        }

        return $this->render('public/formulaireContact.html.twig',array(
            'form'=> $form->createView(),
        ));
    }
}