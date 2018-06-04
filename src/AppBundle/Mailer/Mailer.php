<?php


namespace AppBundle\Mailer;

class Mailer
{

  private $mailer;
  private $templating;



  public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
  {


    $this->mailer= $mailer;
    $this->templating= $templating;
  }
  

  public function sendEmail($setTo, $view, $name)
  {




    $message = (new \Swift_Message('Réservation Flyaround'))
    ->setFrom('reservations@flyaround.com')
    ->setTo($setTo)
    ->setBody(
      $this->templating->render(

        'Emails/'.$view.'.html.twig',
        array('name' => $name)
      ),
      'text/html'
    );

    return $this->mailer->send($message);
  }
}
