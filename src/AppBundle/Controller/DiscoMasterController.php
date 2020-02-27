<?php

namespace AppBundle\Controller;

use AppBundle\Entity\DiscoMaster;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Discomaster controller.
 *
 * @Route("discomaster")
 */
class DiscoMasterController extends Controller
{
    /**
     * Lists all discoMaster entities.
     *
     * @Route("/", name="discomaster_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $discoMasters = $em->getRepository('AppBundle:DiscoMaster')->findAll();

        return $this->render('discomaster/index.html.twig', array(
            'discoMasters' => $discoMasters,
        ));
    }

    /**
     * Creates a new discoMaster entity.
     *
     * @Route("/new", name="discomaster_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $discoMaster = new Discomaster();
        $form = $this->createForm('AppBundle\Form\DiscoMasterType', $discoMaster);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($discoMaster);
            $em->flush();

            return $this->redirectToRoute('discomaster_show', array('id' => $discoMaster->getId()));
        }

        return $this->render('discomaster/new.html.twig', array(
            'discoMaster' => $discoMaster,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a discoMaster entity.
     *
     * @Route("/{id}", name="discomaster_show")
     * @Method("GET")
     */
    public function showAction(DiscoMaster $discoMaster)
    {
        $deleteForm = $this->createDeleteForm($discoMaster);

        return $this->render('discomaster/show.html.twig', array(
            'discoMaster' => $discoMaster,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing discoMaster entity.
     *
     * @Route("/{id}/edit", name="discomaster_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, DiscoMaster $discoMaster)
    {
        $deleteForm = $this->createDeleteForm($discoMaster);
        $editForm = $this->createForm('AppBundle\Form\DiscoMasterType', $discoMaster);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('discomaster_edit', array('id' => $discoMaster->getId()));
        }

        return $this->render('discomaster/edit.html.twig', array(
            'discoMaster' => $discoMaster,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a discoMaster entity.
     *
     * @Route("/{id}", name="discomaster_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, DiscoMaster $discoMaster)
    {
        $form = $this->createDeleteForm($discoMaster);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($discoMaster);
            $em->flush();
        }

        return $this->redirectToRoute('discomaster_index');
    }

    /**
     * Creates a form to delete a discoMaster entity.
     *
     * @param DiscoMaster $discoMaster The discoMaster entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DiscoMaster $discoMaster)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('discomaster_delete', array('id' => $discoMaster->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
