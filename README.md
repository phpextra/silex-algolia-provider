#Silex Service Provider for Algolia Search
-----------------------------------------

This library integrates official [Algolia client](https://github.com/algolia/algoliasearch-client-php) into [Silex](http://silex.sensiolabs.org/).  
[Algolia](https://www.algolia.com/) is a hosted Search API.

1. [Installation](#installation)
2. [Usage](#usage)
    1. [Service registration](#service-registration)
    2. [Using provided trait](#using-provided-trait)
3. [Useful links](#useful-links)
4. [Author](#author)


##Installation

Installation is done using [Composer](https://getcomposer.org/):

    composer require phpextra/silex-algolia-provider

You can test the library using `phpunit` by running the following command (assuming that you have `phpunit` command available):

    phpunit ./tests

##Usage

###Service registration:

    $app = new Application();
    $app->register(new AlgoliaSearchServiceProvider());
    
    $app['algolia.application_id'] = 'dummy';
    $app['algolia.api_key'] = 'dummy';
    $app['algolia.index.name'] = 'dummy';
    
    /* ... */
    
    $app->get(function(Request $request) use ($app){
        return new JsonResponse($app['algolia.index']->search($request->get('q')));
    });

###Using provided trait:

    class MyApplication extends Application 
    {
        use AlgoliaSearchTrait;
        
        public function __construct()
        {
            $this->register(new AlgoliaSearchServiceProvider());
            parent::__construct();
        }
    }
    
    $app = new MyApplication();
    
    /* ... */
    
    $app->algolia(); // gives you access to Algolia Client instance
    $app->search('query'); // performs search

##Useful links

* [Algolia **REST API** documentation](https://www.algolia.com/doc/rest)
* [Algolia PHP Client documentation & integration instructions](https://www.algolia.com/doc/php)
* [Algolia on GitHub](https://github.com/algolia/algoliasearch-client-php)

##Author

- Jacek Kobus <kobus.jacek@gmail.com>