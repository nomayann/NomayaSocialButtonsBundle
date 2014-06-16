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

namespace Nomaya\Bundle\SocialBundle\Twig\Extension;

class NomayaTwigSocialBar extends \Twig_Extension{

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
        return 'nomaya_social_bar';
    }
    
    public function getFunctions()
    {
      return array(
        'socialButtons'     => new \Twig_Function_Method($this, 'getSocialButtons' ,array('is_safe' => array('html'))),
        'facebookButton'    => new \Twig_Function_Method($this, 'getFacebookLikeButton' ,array('is_safe' => array('html'))),
        'twitterButton'     => new \Twig_Function_Method($this, 'getTwitterButton' ,array('is_safe' => array('html'))),
        'googlePlusButton'  => new \Twig_Function_Method($this, 'getGooglePlusButton' ,array('is_safe' => array('html'))),
        'linkedinButton'    => new \Twig_Function_Method($this, 'getLinkedinButton' ,array('is_safe' => array('html'))),
      );
    }

    public function getSocialButtons($parameters = array())
    {
      // no parameters were defined, keeps default values
      if (!array_key_exists('facebook', $parameters)){
        $render_parameters['facebook'] = array();
      // parameters are defined, overrides default values
      }else if(is_array($parameters['facebook'])){
        $render_parameters['facebook'] = $parameters['facebook'];
      // the button is not displayed 
      }else{
        $render_parameters['facebook'] = false;
      }

      if (!array_key_exists('twitter', $parameters)){
        $render_parameters['twitter'] = array();
      }else if(is_array($parameters['twitter'])){
        $render_parameters['twitter'] = $parameters['twitter'];
      }else{
        $render_parameters['twitter'] = false;
      }

      if (!array_key_exists('googleplus', $parameters)){
        $render_parameters['googleplus'] = array();
      }else if(is_array($parameters['googleplus'])){
        $render_parameters['googleplus'] = $parameters['googleplus'];
      }else{
        $render_parameters['googleplus'] = false;
      }

      if (!array_key_exists('linkedin', $parameters)){
        $render_parameters['linkedin'] = array();
      }else if(is_array($parameters['linkedin'])){
        $render_parameters['linkedin'] = $parameters['linkedin'];
      }else{
        $render_parameters['linkedin'] = false;
      }

      // get the helper service and display the template
      return $this->container->get('nomaya.socialBarHelper')->socialButtons($render_parameters);
    }
 
    // https://developers.facebook.com/docs/reference/plugins/like/ 
    public function getFacebookLikeButton($parameters = array())
    {
       // default values, you can override the values by setting them
       $parameters = $parameters + $this->container->getParameter('buttons.facebook');

       return $this->container->get('nomaya.socialBarHelper')->facebookButton($parameters);
    }

    public function getTwitterButton($parameters = array())
    {
       $parameters = $parameters + $this->container->getParameter('buttons.twitter');

       return $this->container->get('nomaya.socialBarHelper')->twitterButton($parameters);
    }

    public function getGooglePlusButton($parameters = array())
    {
       $parameters = $parameters + $this->container->getParameter('buttons.google_plus');

       return $this->container->get('nomaya.socialBarHelper')->googlePlusButton($parameters);
    }
    public function getLinkedinButton($parameters = array())
    {
       $parameters = $parameters + $this->container->getParameter('buttons.linkedin');

       return $this->container->get('nomaya.socialBarHelper')->linkedinButton($parameters);
    }
}