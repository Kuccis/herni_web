<?php

namespace AppBundle\Controller;

use AppBundle\Entity\skladiste;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;



/**
 * Skladiste controller.
 *
 * @Route("skladiste")
 */
class skladisteController extends Controller
{

    /**
     * Lists all skladiste entities.
     *
     * @Route("/", name="skladiste_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $skladistes = $em->getRepository('AppBundle:skladiste')->findAll();

        return $this->render('skladiste/index.html.twig', array(
            'skladistes' => $skladistes,
        ));
    }

  

    /**
     * Creates a new skladiste entity.
     *
     * @Route("/new", name="skladiste_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $skladiste = new Skladiste();
        $form = $this->createForm('AppBundle\Form\skladisteType', $skladiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($skladiste);
            $em->flush();

            return $this->redirectToRoute('skladiste_show', array('id' => $skladiste->getId()));
        }

        return $this->render('skladiste/new.html.twig', array(
            'skladiste' => $skladiste,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a skladiste entity.
     *
     * @Route("/{id}", name="skladiste_show")
     * @Method("GET")
     */
    public function showAction(skladiste $skladiste)
    {
        $deleteForm = $this->createDeleteForm($skladiste);

        return $this->render('skladiste/show.html.twig', array(
            'skladiste' => $skladiste,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing skladiste entity.
     *
     * @Route("/{id}/edit", name="skladiste_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, skladiste $skladiste)
    {
        $deleteForm = $this->createDeleteForm($skladiste);
        $editForm = $this->createForm('AppBundle\Form\skladisteType', $skladiste);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('skladiste_edit', array('id' => $skladiste->getId()));
        }

        return $this->render('skladiste/edit.html.twig', array(
            'skladiste' => $skladiste,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a skladiste entity.
     *
     * @Route("/{id}", name="skladiste_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, skladiste $skladiste)
    {
        $form = $this->createDeleteForm($skladiste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($skladiste);
            $em->flush();
        }

        return $this->redirectToRoute('skladiste_index');
    }

    /**
     * Creates a form to delete a skladiste entity.
     *
     * @param skladiste $skladiste The skladiste entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(skladiste $skladiste)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('skladiste_delete', array('id' => $skladiste->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
