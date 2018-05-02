<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Plop;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Plop controller.
 *
 * @Route("plop")
 */
class PlopController extends Controller
{
    /**
     * Lists all plop entities.
     *
     * @Route("/", name="plop_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $plops = $em->getRepository('AppBundle:Plop')->findAll();

        return $this->render('plop/index.html.twig', array(
            'plops' => $plops,
        ));
    }

    /**
     * Creates a new plop entity.
     *
     * @Route("/new", name="plop_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $plop = new Plop();
        $form = $this->createForm('AppBundle\Form\PlopType', $plop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plop);
            $em->flush();

            return $this->redirectToRoute('plop_show', array('id' => $plop->getId()));
        }

        return $this->render('plop/new.html.twig', array(
            'plop' => $plop,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a plop entity.
     *
     * @Route("/{id}", name="plop_show")
     * @Method("GET")
     */
    public function showAction(Plop $plop)
    {
        $deleteForm = $this->createDeleteForm($plop);

        return $this->render('plop/show.html.twig', array(
            'plop' => $plop,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plop entity.
     *
     * @Route("/{id}/edit", name="plop_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Plop $plop)
    {
        $deleteForm = $this->createDeleteForm($plop);
        $editForm = $this->createForm('AppBundle\Form\PlopType', $plop);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('plop_edit', array('id' => $plop->getId()));
        }

        return $this->render('plop/edit.html.twig', array(
            'plop' => $plop,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a plop entity.
     *
     * @Route("/{id}", name="plop_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Plop $plop)
    {
        $form = $this->createDeleteForm($plop);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plop);
            $em->flush();
        }

        return $this->redirectToRoute('plop_index');
    }

    /**
     * Creates a form to delete a plop entity.
     *
     * @param Plop $plop The plop entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Plop $plop)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('plop_delete', array('id' => $plop->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
