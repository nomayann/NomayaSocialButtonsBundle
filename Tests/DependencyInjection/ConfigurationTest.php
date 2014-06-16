<?php

namespace Nomaya\Bundle\SocialBundle\Tests\DependencyInjection;

use Matthias\SymfonyConfigTest\PhpUnit\AbstractConfigurationTestCase;
use Nomaya\Bundle\SocialBundle\DependencyInjection\Configuration;

class ConfigurationTest extends AbstractConfigurationTestCase
{

    protected function getConfiguration()
    {
        return new Configuration();
    }


    /**
     * Tests that the configuration returns an exception containing an error on the missing 'url' key
     * If an empty array is passed as config
     */
	public function testGetConfigTreeBuilderWithEmptyConfig()
	{
        $this->assertConfigurationIsInvalid(
            array(
                array() // no configuration values at all
            ),
            'url' // exception message should contain "key"
        );
	}
}