<?php

namespace CountryCity\Tests\API;

use CountryCity\API\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    protected static $filename = 'data/geo.json';

    /**
     * Test country API.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @covers \CountryCity\API\Location::getAllCountries
     * @covers \CountryCity\API\Location::countries
     * @covers \CountryCity\API\Location::__construct
     */
    public function testGetAllCountries()
    {
        $location = new Location(self::$filename);
        $allCountries = $location->getAllCountries();
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
     * @covers \CountryCity\API\Location::getAllCities
     * @covers \CountryCity\API\Location::cities
     * @covers \CountryCity\API\Location::__construct
     * @param $countryName
     * @dataProvider Countries
     */
    public function testGetAllCities($countryName)
    {
        $location = new Location(self::$filename);
        $cities = $location->getAllCities($countryName);
        $this->assertFalse(strpos($cities, '"error":"true"'));
    }

    /**
     * Test APIs for exceptions.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @covers \CountryCity\API\Location::getAllCities
     * @covers \CountryCity\API\Location::cities
     * @covers \CountryCity\API\Location::getAllCountries
     * @covers \CountryCity\API\Location::countries
     * @covers \CountryCity\API\Location::__construct
     */
    public function testErrors()
    {

        // test wrong country name
        $location = new Location(self::$filename);
        $output = json_decode($location->getAllCities('covfefe'));
        $this->assertEquals($output->error, "true");

        $location = new Location('');

        $output = json_decode($location->getAllCities('india'));
        $this->assertEquals($output->error, "true");

        $output = json_decode($location->getAllCountries());
        $this->assertEquals($output->error, "true");
    }

    /**
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @return array
     */
    public function Countries()
    {
        $location = new Location(self::$filename);
        $allCountries = $location->getAllCountries();
        $countries = json_decode($allCountries);

        $data = [];
        foreach ($countries as $countryName) {
            $data[] = [$countryName];
        }
        return $data;
    }
}
