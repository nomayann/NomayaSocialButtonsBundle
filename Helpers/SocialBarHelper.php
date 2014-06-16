<?php

namespace Nomaya\Bundle\SocialBundle\Helpers;

use Symfony\Component\Templating\Helper\Helper;
use Symfony\Component\Templating\EngineInterface;

class SocialBarHelper extends Helper
{
    protected $templating;

    public function __construct(EngineInterface $templating)
    {
        $this->templating  = $templating;
    }


    public function socialButtons($parameters)
    {
      return $this->templating->render('NomayaSocialBundle:Social:socialButtons.html.twig', $parameters);
    }

    public function facebookButton($parameters)
    {
      return $this->templating->render('NomayaSocialBundle:Social:facebookButton.html.twig', $parameters);
    }

    public function twitterButton($parameters)
    {
      return $this->templating->render('NomayaSocialBundle:Social:twitterButton.html.twig', $parameters);
    }

    public function googlePlusButton($parameters)
    {
      return $this->templating->render('NomayaSocialBundle:Social:googlePlusButton.html.twig', $parameters);
    }

    public function linkedinButton($parameters)
    {
      return $this->templating->render('NomayaSocialBundle:Social:linkedinButton.html.twig', $parameters);
    }

    public function getName()
    {
        return 'socialButtons';
    }
}