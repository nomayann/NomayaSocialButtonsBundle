<?php

namespace Nomaya\SocialBundle\Tests\DependencyInjection;

use Matthias\SymfonyConfigTest\PhpUnit\AbstractConfigurationTestCase;
use Nomaya\SocialBundle\DependencyInjection\Configuration;

class ConfigurationTest extends AbstractConfigurationTestCase
{

    protected function getConfiguration()
    {
        return new Configuration();
    }


    /**
     * @test
     * Tests that the configuration returns an exception containing an error on the missing 'url' key
     * If an empty array is passed as config
     */
	public function it_fails_with_an_empty_configutaion()
	{
        $this->assertConfigurationIsInvalid(
            array(
                array(), // no configuration values at all
            ), 'buttons'
        );
	}

    /**
     * @test
     * Tests that a configuration with just facebook and the right parameters is validated
     */
    public function it_successes_with_a_right_config()
    {
        $this->assertProcessedConfigurationEquals(
            array(
                array(
                    'buttons'       => array(
                        'facebook'      => array(
                            'url'           => null,
                            'locale'        => 'fr_FR',
                            'send'          => false,
                            'width'         => 300,
                            'showFaces'     => false,
                            'layout'        => 'buttonCount'
                            )
                        ),
                    'links'         => array(
                        )
                )
            ),
            array(
                'buttons'   => array(
                    'facebook'  => array(
                        'url'       => null,
                        'locale'    => 'fr_FR',
                        'send'      => false,
                        'width'     => 300,
                        'showFaces' => false,
                        'layout'    => 'buttonCount'
                    )
                ),
                'links'         => array(
                    ),
                'theme'         => 'default'
            )
        );
    }

    /**
     * @test
     * Tests that a configuration with just wrong type parameters fails
     */
    public function it_fails_with_a_wrong_config()
    {
        $this->assertConfigurationIsInvalid(
            array(
                array(
                    'buttons'       => array(
                        'facebook'      => array(
                            'url'           => null,
                            'locale'        => 'fr_FR',
                            'send'          => 'wrong_value',
                            'width'         => 300,
                            'showFaces'     => false,
                            'layout'        => 'buttonCount'
                        )
                    ),
                    'links' => array(
                    )
                )
            ), 'send' 
        );
    }

    /**
     * @test
     * Tests that a configuration with just a wrong url type parameter
     */
    public function it_fails_with_a_wrong_url_in_buttons()
    {
        $this->assertConfigurationIsInvalid(
            array(
                array(
                    'buttons'       => array(
                        'facebook'      => array(
                            'url'           => 'www',
                            'locale'        => 'fr_FR',
                            'send'          => true,
                            'width'         => 300,
                            'showFaces'     => false,
                            'layout'        => 'buttonCount'
                        )
                    ),
                    'links' => array(
                    )
                )
            ), 'url' 
        );
    }

    /**
     * @test
     * Tests that a configuration with just a wrong url type parameter
     */
    public function it_fails_with_a_wrong_url_in_links()
    {
        $this->assertConfigurationIsInvalid(
            array(
                array(
                    'buttons'       => array(
                        'facebook'      => array(
                            'url'           => null,
                            'locale'        => 'fr_FR',
                            'send'          => true,
                            'width'         => 300,
                            'showFaces'     => false,
                            'layout'        => 'buttonCount'
                            )
                        ),
                    'links' => array(
                        'facebook' => 'www..com'
                    )
                )
            ), 'url' 
        );
    }

    /**
     * @test
     * Tests that a configuration with just facebook and the right url parameters
     */
    public function it_successes_with_a_right_url_config()
    {
        $this->assertProcessedConfigurationEquals(
            array(
                array(
                    'buttons'       => array(
                        'facebook'      => array(
                            'url'           => 'http://www.test.com/',
                            'locale'        => 'fr_FR',
                            'send'          => false,
                            'width'         => 300,
                            'showFaces'     => false,
                            'layout'        => 'buttonCount'
                            )
                        ),
                    'links'         => array(
                        'facebook'      => 'http://www.facebook.com/yann.chauv',
                        'twitter'       => 'https://twitter.com/yannchocho'
                        )
                )
            ),
            array(
                'buttons'   => array(
                    'facebook'  => array(
                        'url'       => 'http://www.test.com/',
                        'locale'    => 'fr_FR',
                        'send'      => false,
                        'width'     => 300,
                        'showFaces' => false,
                        'layout'    => 'buttonCount'
                    )
                ),
                'links'         => array(
                    'facebook'      => 'http://www.facebook.com/yann.chauv',
                    'twitter'       => 'https://twitter.com/yannchocho'
                    ),
                'theme'         => 'default'
            )
        );
    }
}