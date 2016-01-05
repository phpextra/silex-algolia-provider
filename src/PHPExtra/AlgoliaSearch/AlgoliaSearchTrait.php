<?php

namespace PHPExtra\AlgoliaSearch;

use AlgoliaSearch\Client as AlgoliaClient;

/**
 * The AlgoliaSearchTrait class
 *
 * @author Jacek Kobus <kobus.jacek@gmail.com>
 */
trait AlgoliaSearchTrait
{
    /**
     * Access to Algolia client
     *
     * @return AlgoliaClient
     */
    public function algolia()
    {
        return $this['algolia.client'];
    }

    /**
     * Perform search
     *
     * @see https://www.algolia.com/doc/php#search
     *
     * @param string $query The search query
     * @param array  $args  Optional arguments
     *
     * @return array An array of search results
     */
    public function search($query, array $args = array())
    {
        return $this['algolia.index']->search($query, $args);
    }
}