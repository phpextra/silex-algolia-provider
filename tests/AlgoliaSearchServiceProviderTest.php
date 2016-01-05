<?php

namespace PHPExtraTest\AlgoliaSearch;

use PHPExtra\AlgoliaSearch\AlgoliaSearchServiceProvider;
use Silex\Application;

/**
 * The AlgoliaSearchServiceProviderTest class
 *
 * @author Jacek Kobus <kobus.jacek@gmail.com>
 */
class AlgoliaSearchServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testRegisterService()
    {
        $app = new Application();
        $app->register(new AlgoliaSearchServiceProvider());

        $this->assertNull($app['algolia.application_id']);
        $this->assertNull($app['algolia.api_key']);
        $this->assertNull($app['algolia.index.name']);
        $this->assertInternalType('array', $app['algolia.options']);
        $this->assertInternalType('array', $app['algolia.hosts']);
    }

    public function testGetClientInstance()
    {
        $app = new Application();
        $app->register(new AlgoliaSearchServiceProvider());

        $app['algolia.application_id'] = 'dummy';
        $app['algolia.api_key'] = 'dummy';

        $app['algolia.client'];
    }

    public function testGetIndexInstance()
    {
        $app = new Application();
        $app->register(new AlgoliaSearchServiceProvider());

        $app['algolia.application_id'] = 'dummy';
        $app['algolia.api_key'] = 'dummy';
        $app['algolia.index.name'] = 'dummy';

        $app['algolia.index'];
    }
}
