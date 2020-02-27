<?php

namespace AppBundle\Controller;

use AppBundle\Entity\RRPP;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Rrpp controller.
 *
 * @Route("rrpp")
 */
class RRPPController extends Controller
{
    /**
     * Lists all rRPP entities.
     *
     * @Route("/", name="rrpp_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rRPPs = $em->getRepository('AppBundle:RRPP')->findAll();

        return $this->render('rrpp/index.html.twig', array(
            'rRPPs' => $rRPPs,
        ));
    }

    /**
     * Creates a new rRPP entity.
     *
     * @Route("/new", name="rrpp_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $rRPP = new Rrpp();
        $form = $this->createForm('AppBundle\Form\RRPPType', $rRPP);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rRPP);
            $em->flush();

            return $this->redirectToRoute('rrpp_show', array('id' => $rRPP->getId()));
        }

        return $this->render('rrpp/new.html.twig', array(
            'rRPP' => $rRPP,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a rRPP entity.
     *
     * @Route("/{id}", name="rrpp_show")
     * @Method("GET")
     */
    public function showAction(RRPP $rRPP)
    {
        $deleteForm = $this->createDeleteForm($rRPP);

        return $this->render('rrpp/show.html.twig', array(
            'rRPP' => $rRPP,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing rRPP entity.
     *
     * @Route("/{id}/edit", name="rrpp_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, RRPP $rRPP)
    {
        $deleteForm = $this->createDeleteForm($rRPP);
        $editForm = $this->createForm('AppBundle\Form\RRPPType', $rRPP);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rrpp_edit', array('id' => $rRPP->getId()));
        }

        return $this->render('rrpp/edit.html.twig', array(
            'rRPP' => $rRPP,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a rRPP entity.
     *
     * @Route("/{id}", name="rrpp_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, RRPP $rRPP)
    {
        $form = $this->createDeleteForm($rRPP);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rRPP);
            $em->flush();
        }

        return $this->redirectToRoute('rrpp_index');
    }

    /**
     * Creates a form to delete a rRPP entity.
     *
     * @param RRPP $rRPP The rRPP entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(RRPP $rRPP)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rrpp_delete', array('id' => $rRPP->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
