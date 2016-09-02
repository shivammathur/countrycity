<?php

namespace CountryCity\API;


use MongoDB\Client;

/**
 * This Class handles MongoDB.
 *
 * Class Db
 * @package CountryCity\API
 */
Class Db implements Idb
{
    /**
     * Connect to MongoDB database and return the database object.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @param $databaseName
     * @param $collectionName
     * @return \MongoDB\Collection
     */
    public function connect($databaseName, $collectionName)
    {
        return $this->mongoConnect($databaseName, $collectionName);
    }

    /**
     * Returns a MongoDB Client.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @param bool $test
     * @return Client
     */
    public function client($test = false)
    {
        return $this->mongoClient($test);
    }

    /**
     * Connect to MongoDB database and return the database object.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @param $databaseName
     * @param $collectionName
     * @return \MongoDB\Collection
     * @throws \Exception
     */
    private function mongoConnect($databaseName, $collectionName)
    {
        if ($databaseName == '' || $collectionName == '') {
            throw new \Exception("Data insufficient to connect");
        }

        $client = $this->mongoClient();
        $database = $client->selectDatabase($databaseName);
        $collection = $database->selectCollection($collectionName);

        return $collection;
    }

    /**
     * Returns a MongoDB Client.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @param bool $test
     * @return Client
     * @throws \Exception
     */
    private function mongoClient($test = false)
    {
        $client = null;
        if (!$test) {
            /** @var \MongoDB\Client $client */
            $client = new Client();
        }

        if (!$client instanceof Client) {
            throw new \Exception("MongoDB process is not running", 1);
        }

        return $client;
    }
}