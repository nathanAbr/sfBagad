<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Concours;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use AppBundle\Type\ConcoursType;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Concour controller.
 *
 * @Route("admin/concours")
 */
class ConcoursController extends Controller
{
    /**
     * Lists all concour entities.
     *
     * @Route("/", name="admin_concours_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $concours = $em->getRepository('AppBundle:Concours')->findAll();

        $concour = new  Concours();
        $form = $this->createForm(ConcoursType::class, $concour);

        return $this->render('espaceMembres/concours.html.twig', array(
            'concours' => $concours,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new concour entity.
     *
     * @Route("/new", name="admin_concours_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request,EntityManagerInterface $em)
    {
        $concours = new  Concours();
        $form = $this->createForm(ConcoursType::class, $concours);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $concours = $form->getData();
            $em->persist($concours);
            $em->flush();
        }
        $concours = $em->getRepository('AppBundle:Concours')->findAll();
        return $this->render('espaceMembres/concours.html.twig',array(
            'concours' => $concours,
            'form'=> $form->createView(),
        ));
    }

    /**
     * Finds and displays a concour entity.
     *
     * @Route("/{id}", name="admin_concours_show")
     * @Method("GET")
     */
    public function showAction(Concours $concours)
    {
        $deleteForm = $this->createDeleteForm($concours);

        return $this->render('concours/show.html.twig', array(
            'concours' => $concours,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing concour entity.
     *
     * @Route("/{id}/edit", name="admin_concours_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Concours $concours)
    {
        $deleteForm = $this->createDeleteForm($concours);
        $editForm = $this->createForm('AppBundle\Type\ConcoursType', $concours);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_concours_index', array('id' => $concours->getId()));
        }

        return $this->render('concours/edit.html.twig', array(
            'concours' => $concours,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a concour entity.
     *
     * @Route("/{id}", name="admin_concours_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Concours $concours)
    {
        $form = $this->createDeleteForm($concours);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($concours);
            $em->flush();
        }

        return $this->redirectToRoute('admin_concours_index');
    }

    /**
     * Creates a form to delete a concour entity.
     *
     * @param Concours $concour The concour entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Concours $concours)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_concours_delete', array('id' => $concours->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
