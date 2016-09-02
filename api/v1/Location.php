<?php

namespace CountryCity\API;


class Location
{

    /**
     * @var \MongoDB\Collection $db
     */
    protected $database;

    /**
     * Location constructor.
     * @param $databaseName
     * @param $collectionName
     */
    public function __construct($databaseName, $collectionName)
    {
        /** @var \MongoDB\Collection $this->db */
        $this->database = (new Db())->connect($databaseName, $collectionName);
    }

    /**
     * Return the json encoded list of all countries.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @return string
     */
    public function getAllCountries()
    {
        try {
            $allCountries = $this->countries();
        } catch (\Exception $exception) {
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
     * @return string
     */
    public function getAllCities($countryName)
    {
        $countryName = trim(stripslashes(ucwords($countryName)));

        try {
            $allCities = $this->cities($countryName);
        } catch (\Exception $exception) {
            return json_encode(["error" => "true", "message" => $exception->getMessage()]);
        }

        return json_encode($allCities, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Return the array containing all countries.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @return array
     * @throws \Exception
     */
    private function countries()
    {
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

        if ($locationData) {
            // Getting the names of countries from $locationData
            $countries = array_keys($locationData);

            sort($countries);
        } else {
            throw new \Exception('No data in database');
        }

        return $countries;
    }

    /**
     * Returns the array containing all cities in a country.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @param $countryName
     * @return array
     * @throws \Exception
     */
    private function cities($countryName)
    {
        if($countryName == '_id'){
            throw new \Exception('Could not found the country - ' . $countryName);
        }

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

        if ($locationData) {

            // Getting names of cities from $locationData
            $cities = $locationData[$countryName];

            sort($cities);
        } else {
            throw new \Exception('Could not found the country - ' . $countryName);
        }

        return $cities;
    }
}