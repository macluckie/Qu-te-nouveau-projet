<?php
namespace MC\premierBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class McController extends Controller
{
    public function indexAction()
    {

        $contents = $this->get('templating')->render(
            'MCpremierBundle:Mc:index.html.twig',
            ['toto'=>'riri']
        );
          return new Response($content);
    }
}
