<?php

namespace CountryCity\API;


use MongoDB\Collection;
use Exception;

/**
 * This class handles location data.
 *
 * Class Location
 * @package CountryCity\API
 */
class Location
{
    /**
     * @var Collection $db
     */
    protected $database;

    /**
     * Location constructor.
     * @param $databaseName
     * @param $collectionName
     */
    public function __construct($databaseName, $collectionName)
    {
        /** @var Collection $this ->db */
        $this->database = (new Db())->connect($databaseName, $collectionName);
    }

    /**
     * Return the json encoded list of all countries.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @param bool $test
     *
     * @return string
     */
    public function getAllCountries($test = false)
    {
        try {
            $allCountries = $this->countries($test);
        } catch (Exception $exception) {
            return json_encode(["error" => "true", "message" => $exception->getMessage()]);
        }

        return json_encode($allCountries, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Return the json encoded list of all cities in a country.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @param  $countryName
     * @param bool $test
     * @return string
     */
    public function getAllCities($countryName, $test = false)
    {
        $countryName = trim(stripslashes(ucwords($countryName)));

        try {
            $allCities = $this->cities($countryName, $test);
        } catch (Exception $exception) {
            return json_encode(["error" => "true", "message" => $exception->getMessage()]);
        }

        return json_encode($allCities, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Return the array containing all countries.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @param bool $test
     * @return array
     * @throws Exception
     */
    private function countries($test = false)
    {
        $locationData = [];
        if (!$test) {
            $locationData = $this->database->findOne(
                [],
                [
                    'projection' => [
                        '_id' => false
                    ],

                    'typeMap' => [
                        'root' => 'array',
                        'document' => 'array'
                    ]
                ]
            );
        }

        if (!$locationData) {
            throw new Exception('No data in database');
        }

        // Getting the names of countries from $locationData
        $countries = array_keys($locationData);

        sort($countries);

        return $countries;
    }

    /**
     * Returns the array containing all cities in a country.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @param $countryName
     * @param bool $test
     * @return array
     * @throws Exception
     */
    private function cities($countryName, $test = false)
    {
        if ($countryName == '_id') {
            throw new Exception('Could not found the country - ' . $countryName);
        }

        $locationData = [];
        if (!$test) {
            $locationData = $this->database->findOne(
                [],
                [
                    'projection' => [
                        '_id' => false,
                        $countryName => true
                    ],

                    'typeMap' => [
                        'root' => 'array',
                        'document' => 'array'
                    ]
                ]
            );
        }

        if (!$locationData) {
            throw new Exception('Could not found the country - ' . $countryName);
        }

        // Getting names of cities from $locationData
        $cities = $locationData[$countryName];

        sort($cities);

        return $cities;
    }
}