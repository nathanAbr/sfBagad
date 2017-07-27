<?php
/**
 * Created by PhpStorm.
 * User: Nathan
 * Date: 26/07/2017
 * Time: 13:34
 */

namespace AppBundle\Controller;

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
     * @Route("/bagadig", name="bagadig")
     */
    public function bagadigAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('public/bagadig.html.twig');
    }

    /**
     * @Route("/dataEvent", name="bagadig")
     */
    public function eventDataAction(EntityManagerInterface $entityManager){

        $reunions = $entityManager->getRepository(Reunion::class)->findByCurrentMonth();
        $sorties = $entityManager->getRepository(Sortie::class)->findByCurrentMonth();
        $concours = $entityManager->getRepository(Concours::class)->findByCurrentMonth();
        $sessions = $entityManager->getRepository(Session::class)->findByCurrentMonth();

        dump($reunions);

        $evenements["Reunions"] = $reunions;
        $evenements["Sorties"] = $sorties;
        $evenements["Concours"] = $concours;
        $evenements["Sessions"] = $sessions;

        $evenements = json_encode($evenements);

        return new Response($evenements);
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