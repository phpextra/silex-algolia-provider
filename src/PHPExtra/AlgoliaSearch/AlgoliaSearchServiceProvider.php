<?php

namespace PHPExtra\AlgoliaSearch;

use AlgoliaSearch\Client;
use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * The AlgoliaSearchServiceProvider class
 *
 * @author Jacek Kobus <kobus.jacek@gmail.com>
 */
class AlgoliaSearchServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['algolia.application_id'] = null;
        $app['algolia.api_key'] = null;
        $app['algolia.hosts'] = array();
        $app['algolia.options'] = array();
        $app['algolia.index.name'] = null;

        $app['algolia.index'] = $app->share(function(Application $app){
            return $app['algolia.client']->initIndex($app['algolia.index.name']);
        });

        $app['algolia.client'] = $app->share(function(Application $app){
            return new Client(
                $app['algolia.application_id'],
                $app['algolia.api_key'],
                $app['algolia.hosts'],
                $app['algolia.options']
            );
        });
    }

    public function boot(Application $app)
    {
    }
}