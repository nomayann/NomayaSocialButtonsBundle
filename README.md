NomayaSocialButtonsBundle
=========================

This bundle provides a simple way to integrate a bar of social buttons to share your pages on Facebook, Twitter, Google Plus and Linkdein.

## Introduction

I have not found any Symfony2 bundle to respond to this common need: display "share", "like"... buttons with an easy integration into templates.
It is intended to evolve :
- display links to network pages
- manage more networks 
- use custom icons
- compatibility with php templates
- suggestions are welcome

Yann

## Requirements

* Symfony 2.1 +

## Installation

### Add in your composer.json

``` js
{
    //...
    "require": {
        "nomaya/social-bundle": "dev-master"
    }
}
```

### Install the bundle

``` bash
$ curl -s http://getcomposer.org/installer | php
$ php composer.phar update nomaya/socialbundle
```

Composer will install the bundle to your project's `vendor/nomaya` directory.

### Enable the bundle via the kernel

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Nomaya\Bundle\SocialBundle\NomayaSocialBundle(),
    );
}
```

## Configuration

add to your config.yml file the parameters:

// app/config/config.yml

``` yaml
//...
nomaya_social:
    buttons:
        facebook:
            url:            null
            locale:         "fr_FR"
            send:           false
            width:          300
            showFaces:      false
            layout:         "button_count"
        twitter:
            url:            null
            locale:         "fr"
            message:        "Je veux partager ça avec vous"
            text:           "Tweet"
            via:            "L'Equipe du site"
            tag:            "ttot"
        google_plus:
            url:            null
            locale :        "fr"
            size :          "medium"
            annotation :    "bubble"
            width :         300
        linkedin:            
            url:            null
            locale:         "fr_FR"
            counter:        "right"
```

Get the options details : 
- https://developers.facebook.com/docs/plugins/like-button
- https://developers.google.com/+/web/+1button/
- https://about.twitter.com/resources/buttons
- https://developer.linkedin.com/plugins/share-plugin-generator



## Twig extension

The bundle provides a Twig extension for quickly generating the buttons.

``` twig
"// Insert the whole bar"
"{{ socialButtons() }}"

"// Insert only one button"
"{{ twitterButton() }}"
"// or"
"{{ socialButtons( {'googleplus':false, 'facebook':false, 'linkedin':false} ) }}"

"// insert the google+ button with custom parameters"
"{{ googlePlusButton( {'locale':'fr', 'url':'http://google.fr' }) }}"

"// insert the bar with specific values for Facebook"
"{{ socialButtons( { 'facebook': {'locale':'fr_FR', 'send':true}} ) }}"
```
## Notes

Pull requests a very welcome to integrate more buttons to this extension.

Thanks to Gregquat for his article: http://obtao.com/blog/2012/11/social-buttons-bar-for-facebook-twitter-google-with-symfony/ which did most of the work.

## License

This bundle is under the MIT license. For the full copyright and license information, please view the LICENSE file that
was distributed with this source code.
