<?php
/*
Copyright (c) 2014 Yann Chauvel - Nomaya.net - yann@nomaya.net

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

namespace Nomaya\SocialBundle\Twig\Extension;

class NomayaTwigSocialLinks extends \Twig_Extension{

    protected $container;

    /**
     * Constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }
    
    public function getName()
    {
        return 'nomaya_social_links';
    }
    
    public function getFunctions()
    {
      return array(
        'socialLinks'     => new \Twig_Function_Method($this, 'getSocialLinks' ,array('is_safe' => array('html'))),
        'socialLink'     => new \Twig_Function_Method($this, 'getSocialLink' ,array('is_safe' => array('html')))
      );
    }

    public function getSocialLinks($parameters = array())
    {
      $networks = array('facebook', 'twitter', 'googleplus', 'linkedin', 'tumblr', 'pinterest', 'youtube', 'instagram');
      foreach ($networks as $network)
      {
          // no parameters were defined, keeps default values
          if (!array_key_exists($network, $parameters)){
            $render_parameters[$network] = array();
          // parameters are defined, overrides default values
          } else if (is_array($parameters[$network])){
            $render_parameters[$network] = $parameters[$network];
          // the button is not displayed 
          } else {
            $render_parameters[$network] = false;
          }
      }

      // get the helper service and display the template
      return $this->container->get('nomaya.socialLinksHelper')->socialLinks($render_parameters);
    }

    // https://developers.facebook.com/docs/reference/plugins/like/ 
    public function getSocialLink($network, $parameters = array())
    {
       // default values, you can override the values by setting them
       $otherParameters = $this->container->hasParameter('links.'.$network) ? $this->container->getParameter('links.'.$network) : array();
       $parameters = $parameters + $otherParameters;

       if (!array_key_exists('network', $parameters)) { $parameters = $parameters + array('network' => $network); }
       if (!array_key_exists('theme', $parameters)) { $parameters = $parameters + array('theme' => $this->container->getParameter('social.theme')); }

       return !empty($parameters) && array_key_exists('url', $parameters) ? $this->container->get('nomaya.socialLinksHelper')->socialLink($parameters): false;
    }
}