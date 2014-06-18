<?php

namespace Nomaya\SocialBundle\Helpers;

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
      return $this->templating->render('NomayaSocialBundle:Buttons:socialButtons.html.twig', $parameters);
    }

    private function socialButton($network, $parameters)
    {
      return $this->templating->render('NomayaSocialBundle:Buttons:'.$network.'Button.html.twig', $parameters);
    }

    public function facebookButton($parameters)
    {
      return $this->socialButton('facebook',$parameters);
    }

    public function twitterButton($parameters)
    {
      return $this->socialButton('twitter',$parameters);
    }

    public function googlePlusButton($parameters)
    {
     return $this->socialButton('googleplus',$parameters);
    }

    public function linkedinButton($parameters)
    {
      return $this->socialButton('linkedin',$parameters);
    }

    public function pinterestButton($parameters)
    {
      return $this->socialButton('pinterest',$parameters);
    }

    public function getName()
    {
        return 'socialButtons';
    }

}