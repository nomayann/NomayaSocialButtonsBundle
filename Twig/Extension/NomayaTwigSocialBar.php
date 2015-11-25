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

class NomayaTwigSocialBar extends \Twig_Extension{

    protected $container;

    protected $networks;

    /**
     * Constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct($container)
    {
        $this->container = $container;
        $this->networks = array('facebook', 'twitter', 'googleplus', 'linkedin', 'tumblr', 'pinterest', 'youtube', 'instagram');
    }
    
    public function getName()
    {
        return 'nomaya_social_bar';
    }
    
    public function getFunctions()
    {
      return array(
        'socialButtons'     => new \Twig_Function_Method($this, 'getSocialButtons' ,array('is_safe' => array('html'))),
        'facebookButton'    => new \Twig_Function_Method($this, 'getFacebookLikeButton' ,array('is_safe' => array('html'))),
        'twitterButton'     => new \Twig_Function_Method($this, 'getTwitterButton' ,array('is_safe' => array('html'))),
        'googleplusButton'  => new \Twig_Function_Method($this, 'getGoogleplusButton' ,array('is_safe' => array('html'))),
        'linkedinButton'    => new \Twig_Function_Method($this, 'getLinkedinButton' ,array('is_safe' => array('html'))),
        'pinterestButton'   => new \Twig_Function_Method($this, 'getPinterestButton' ,array('is_safe' => array('html'))),
      );
    }

    public function getSocialButtons($parameters = array())
    {

      foreach ($this->networks as $network)
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
      return $this->container->get('nomaya.socialBarHelper')->socialButtons($render_parameters);
    }
 
    // https://developers.facebook.com/docs/reference/plugins/like/ 
    public function getFacebookLikeButton($parameters = array())
    {
       // default values, you can override the values by setting them
       return $this->getButton('facebook',$parameters);
    }

    public function getTwitterButton($parameters = array())
    {
       return $this->getButton('twitter',$parameters);
    }

    public function getGoogleplusButton($parameters = array())
    {
       return $this->getButton('googleplus',$parameters);
       
    }
    public function getLinkedinButton($parameters = array())
    {
       return $this->getButton('linkedin',$parameters);
    }

    public function getPinterestButton($parameters = array())
    {
       return $this->getButton('pinterest',$parameters);
    }

    private function getButton($network, $parameters = array())
    {
       $parameters = $parameters + $this->container->getParameter('buttons.'.$network);
       $Button=$network.'Button';
       return $this->container->get('nomaya.socialBarHelper')->$Button($parameters);
    }

    /**
     * @param array $networks
     *
     * @return $this
     */
    public function setNetworks($networks)
    {
        $this->networks = $networks;

        return $this;
    }
}