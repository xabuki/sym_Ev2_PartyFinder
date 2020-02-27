<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Discoteca;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Discoteca controller.
 *
 * @Route("discoteca")
 */
class DiscotecaController extends Controller
{
    /**
     * Lists all discoteca entities.
     *
     * @Route("/", name="discoteca_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $discotecas = $em->getRepository('AppBundle:Discoteca')->findAll();

        return $this->render('discoteca/index.html.twig', array(
            'discotecas' => $discotecas,
        ));
    }

    /**
     * Creates a new discoteca entity.
     *
     * @Route("/new", name="discoteca_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $discoteca = new Discoteca();
        $form = $this->createForm('AppBundle\Form\DiscotecaType', $discoteca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($discoteca);
            $em->flush();

            return $this->redirectToRoute('discoteca_show', array('id' => $discoteca->getId()));
        }

        return $this->render('discoteca/new.html.twig', array(
            'discoteca' => $discoteca,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a discoteca entity.
     *
     * @Route("/{id}", name="discoteca_show")
     * @Method("GET")
     */
    public function showAction(Discoteca $discoteca)
    {
        $deleteForm = $this->createDeleteForm($discoteca);

        return $this->render('discoteca/show.html.twig', array(
            'discoteca' => $discoteca,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing discoteca entity.
     *
     * @Route("/{id}/edit", name="discoteca_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Discoteca $discoteca)
    {
        $deleteForm = $this->createDeleteForm($discoteca);
        $editForm = $this->createForm('AppBundle\Form\DiscotecaType', $discoteca);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('discoteca_edit', array('id' => $discoteca->getId()));
        }

        return $this->render('discoteca/edit.html.twig', array(
            'discoteca' => $discoteca,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a discoteca entity.
     *
     * @Route("/{id}/delete", name="discoteca_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Discoteca $discoteca)
    {
        $form = $this->createDeleteForm($discoteca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($discoteca);
            $em->flush();
        }

        return $this->redirectToRoute('discoteca_index');
    }

    /**
     * Creates a form to delete a discoteca entity.
     *
     * @param Discoteca $discoteca The discoteca entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Discoteca $discoteca)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('discoteca_delete', array('id' => $discoteca->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
