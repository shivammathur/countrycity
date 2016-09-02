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
     *
     * @covers \CountryCity\API\Location::getAllCountries()
     * @covers \CountryCity\API\Location::countries()
     * @covers \CountryCity\API\Location::__construct
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
     * @covers       \CountryCity\API\Location::getAllCities()
     * @covers       \CountryCity\API\Location::cities()
     * @covers       \CountryCity\API\Location::__construct
     * @param $countryName
     * @dataProvider Countries
     */
    public function testGetAllCities($countryName)
    {
        $Location = new Location(self::$databaseName, self::$collection);
        $cities = $Location->getAllCities($countryName);

        $this->assertNotNull(json_decode($cities));
    }

    /**
     * Test APIs for exceptions.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @covers \CountryCity\API\Location::getAllCities()
     * @covers \CountryCity\API\Location::cities()
     * @covers \CountryCity\API\Location::getAllCountries()
     * @covers \CountryCity\API\Location::countries()
     * @covers \CountryCity\API\Location::__construct
     */
    public function testExceptions()
    {
        $Location = new Location(self::$databaseName, self::$collection);
        $output = json_decode($Location->getAllCities('_id'));
        $this->assertEquals($output->error, "true");

        $output = json_decode($Location->getAllCities('india', true));
        $this->assertEquals($output->error, "true");

        $output = json_decode($Location->getAllCountries(true));
        $this->assertEquals($output->error, "true");
    }

    /**
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @return array
     */
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
