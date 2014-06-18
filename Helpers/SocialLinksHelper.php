<?php

namespace Nomaya\SocialBundle\Helpers;

use Symfony\Component\Templating\Helper\Helper;
use Symfony\Component\Templating\EngineInterface;

class SocialLinksHelper extends Helper
{
    protected $templating;

    public function __construct(EngineInterface $templating)
    {
        $this->templating  = $templating;
    }


    public function socialLinks($parameters)
    {
      return $this->templating->render('NomayaSocialBundle:Links:socialLinks.html.twig', $parameters);
    }

    public function socialLink($parameters)
    {
      return $this->templating->render('NomayaSocialBundle:Links:socialLink.html.twig', $parameters);
    }

    public function getName()
    {
        return 'socialLinks';
    }
}