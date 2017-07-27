<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 26/07/2017
 * Time: 13:34
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Evenement;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Concours;
use AppBundle\Entity\Reunion;
use AppBundle\Entity\Session;
use AppBundle\Entity\Sortie;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PublicController extends Controller
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
     * @Route("/evenement", name="evenements")
     */
    public function evenementsAction(Request $request)
    {
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

    /**
     * @Route("/dataEvent", name="dataEvent")
     */
    public function eventDataAction(EntityManagerInterface $entityManager){

        $start = $_POST['start'];
        $end = $_POST['end'];

        $reunions = $entityManager->getRepository(Reunion::class)->findByCurrentMonth($start, $end);
        $sorties = $entityManager->getRepository(Sortie::class)->findByCurrentMonth($start, $end);
        $concours = $entityManager->getRepository(Concours::class)->findByCurrentMonth($start, $end);
        $sessions = $entityManager->getRepository(Session::class)->findByCurrentMonth($start, $end);

        dump($reunions);

        $evenements = [];
        $evenement = new \stdClass();

        foreach($reunions as $reunion){
            $evenement->start = $reunion['dateDebut']->date;
            $evenement->end = $reunion['dateFin']->date;
            $evenement->id = $reunion['id'];
            $evenement->url = '/evenement/'.$reunion['id'];
            $evenement->backgroundColor = 'blue';
            $evenements[] = $evenement;
        }

        foreach($sorties as $sortie){
            $evenement->start = $sortie['dateDebut']->date;
            $evenement->end = $sortie['dateFin']->date;
            $evenement->id = $sortie['id'];
            $evenement->url = '/evenement/'.$sortie['id'];
            $evenement->backgroundColor = 'red';
            $evenements[] = $evenement;
        }

        foreach($concours as $concour){
            $evenement->start = $concour['dateDebut']->date;
            $evenement->end = $concour['dateFin']->date;
            $evenement->id = $concour['id'];
            $evenement->url = '/evenement/'.$concour['id'];
            $evenement->backgroundColor = 'green';
            $evenements[] = $evenement;
        }

        foreach($sessions as $session){
            $evenement->start = $session['dateDebut']->date;
            $evenement->end = $session['dateFin']->date;
            $evenement->id = $session['id'];
            $evenement->url = '/evenement/'.$session['id'];
            $evenement->backgroundColor = 'yellow';
            $evenements[] = $evenement;
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