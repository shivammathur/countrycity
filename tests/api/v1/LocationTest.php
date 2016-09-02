<?php

namespace CountryCity\Tests\API;


use CountryCity\API\Location;

class LocationTest extends \PHPUnit_Framework_TestCase
{
    protected static $databaseName = 'countrycity';
    protected static $collection = 'geo';

    /**
     * Test country API.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     */
    public function testGetAllCountries()
    {
        $Location = new Location(self::$databaseName, self::$collection);
        $allCountries = $Location->getAllCountries();
        $countries = json_decode($allCountries);

        $this->assertNotEquals($allCountries, '');
        $this->assertNotNull($countries);
        $this->assertCount(247, $countries);
    }

    /**
     * Test cities API.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @param $countryName
     * @dataProvider Countries
     */
    public function testGetAllCities($countryName)
    {
        $Location = new Location(self::$databaseName, self::$collection);
        $cities = $Location->getAllCities($countryName);

        $this->assertNotNull(json_decode($cities));
    }

    public function Countries()
    {
        $Location = new Location(self::$databaseName, self::$collection);
        $allCountries = $Location->getAllCountries();
        $countries = json_decode($allCountries);

        $data = [];
        foreach ($countries as $countryName) {
            $data[] = [$countryName];
        }
        return $data;
    }
}
