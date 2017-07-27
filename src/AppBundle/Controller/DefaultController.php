<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Type\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


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

        return $this->render('public/accueil.html.twig', array('listeEvenements'=>$listeEvenement));
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
