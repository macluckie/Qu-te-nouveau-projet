<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/review")
 */
class ReviewController extends Controller
{
    /**
     * @Route("/"), name="index_review"
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()-> getManager();
        $reviews = $em->getRepository('AppBundle:Review')-> findAll();
        return $this->render('review\review.html.twig', array(
          'reviews'=>$reviews
        ));
    }



    /**
     * @Route("/new"), name="new_review"
     */
    public function newAction(Request $request)
    {

        $review = new Review();
        $form = $this->createForm('AppBundle\Form\ReviewType', $review);
          $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($review);
            $em->flush();

            return $this->redirectToRoute('review_show', array('id' => $review->getId()));
        }


        return $this->render('review\new.html.twig', array(
          'review' => $review,
          'form' => $form->createView()

        ));
    }
}
