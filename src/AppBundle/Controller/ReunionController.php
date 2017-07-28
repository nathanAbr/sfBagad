<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reunion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Reunion controller.
 *
 * @Route("admin/reunion")
 */
class ReunionController extends Controller
{
    /**
     * Lists all reunion entities.
     *
     * @Route("/index", name="admin_reunion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reunions = $em->getRepository('AppBundle:Reunion')->findAll();



        return $this->render('reunion/index.html.twig', array(
            'reunions' => $reunions,

        ));
    }

    /**
     * Creates a new reunion entity.
     *
     * @Route("/new", name="admin_reunion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reunion = new Reunion();
        $form = $this->createForm('AppBundle\Form\ReunionType', $reunion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reunion);
            $em->flush();
            return $this->redirectToRoute('admin_index');
        }

        return $this->render('reunion/new.html.twig', array(
            'reunion' => $reunion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reunion entity.
     *
     * @Route("/{id}", name="admin_reunion_show")
     * @Method("GET")
     */
    public function showAction(Reunion $reunion)
    {
        $deleteForm = $this->createDeleteForm($reunion);

        return $this->render('reunion/show.html.twig', array(
            'reunion' => $reunion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reunion entity.
     *
     * @Route("/{id}/edit", name="admin_reunion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reunion $reunion)
    {
        $deleteForm = $this->createDeleteForm($reunion);
        $editForm = $this->createForm('AppBundle\Form\ReunionType', $reunion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_edit', array('id' => $reunion->getId()));
        }

        return $this->render('reunion/edit.html.twig', array(
            'reunion' => $reunion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reunion entity.
     *
     * @Route("/{id}", name="admin_reunion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reunion $reunion)
    {
        $form = $this->createDeleteForm($reunion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reunion);
            $em->flush();
        }

        return $this->redirectToRoute('admin_index');
    }

    /**
     * Creates a form to delete a reunion entity.
     *
     * @param Reunion $reunion The reunion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reunion $reunion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_reunion_delete', array('id' => $reunion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
