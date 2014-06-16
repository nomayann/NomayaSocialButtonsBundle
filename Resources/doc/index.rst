.. socialBundle documentation master file, created by
   sphinx-quickstart on Sat Jun 14 17:43:23 2014.
   You can adapt this file completely to your liking, but it should at least
   contain the root `toctree` directive.

Welcome to socialBundle's documentation!
========================================

Contents:

.. toctree::
   :maxdepth: 2



Indices and tables
==================

* :ref:`genindex`
* :ref:`modindex`
* :ref:`search`


** This Bundle lets you easily add social buttons into your pages just by adding "{{ socialButtons() }}" to your templates.**

To choose which buttons you wish to add, use this syntax: {{ twitterButton() }}
// or 
{{ socialButtons( {'googleplus':false, 'facebook':false} ) }}

Integrated networks
------------------------------------
In its first release, it integrates these sharing buttons:
- Facebook
- Twitter
- Google Plus
- linkedin

Installation
------------------------------------
**via Composer:**

``composer require...``

then add this line to your appKernel.php file

Finally, add the parameters to your app/config/config.yml file:

social:
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
            via:            "L'Equipe cartedevisitevirtuelle.fr"
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

Of course, you may override the templates by a bundle that inherits this one.
You've got 1 template that holds all the buttons and one per different button.

Pull requests a very welcome to integrate more and more networks to this extension.

Thanks to Gregquat for his article: http://obtao.com/blog/2012/11/social-buttons-bar-for-facebook-twitter-google-with-symfony/ which did most of the work.

Endroid QR Code Bundle
======================

This bundle provides a simple way to integrate social buttons to share with Facebook, Twitter, Google Plus an Linkdein.

[![knpbundles.com](http://knpbundles.com/endroid/EndroidQrCodeBundle/badge-short)](http://knpbundles.com/endroid/EndroidQrCodeBundle)

## Requirements

* Symfony
* Dependencies:
 * [`QrCode`](https://github.com/endroid/QrCode)

## Installation

### Add in your composer.json

``` js
{
    "require": {
        "endroid/qrcode-bundle": "dev-master"
    }
}
```

### Install the bundle

``` bash
$ curl -s http://getcomposer.org/installer | php
$ php composer.phar update endroid/qrcode-bundle
```

Composer will install the bundle to your project's `vendor/endroid` directory.

### Enable the bundle via the kernel

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Endroid\Bundle\QrCodeBundle\EndroidQrCodeBundle(),
    );
}
```

## Twig extension

The bundle provides a Twig extension for quickly generating the buttons.

``` twig
"{{ socialButtons() }}"
"{{ twitterButton() }}"
```

## Configuration

// app/config/config.yml

``` yaml
social:
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
            via:            "L'Equipe cartedevisitevirtuelle.fr"
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

## Usage

Nothing more to do to use this bundle

## Notes

Pull requests a very welcome to integrate more and more networks to this extension.

Thanks to Gregquat for his article: _http://obtao.com/blog/2012/11/social-buttons-bar-for-facebook-twitter-google-with-symfony/ which did most of the work.:http://obtao.com/blog/2012/11/social-buttons-bar-for-facebook-twitter-google-with-symfony/

## License

This bundle is under the MIT license. For the full copyright and license information, please view the LICENSE file that
was distributed with this source code.
