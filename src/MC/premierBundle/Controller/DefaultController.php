<?php

namespace MC\premierBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MCpremierBundle:Default:index.html.twig');
    }



}
