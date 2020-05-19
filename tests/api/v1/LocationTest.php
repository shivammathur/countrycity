<?php

namespace CountryCity\Tests\API;

use CountryCity\API\Location;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase
{
    /**
     * Test country API.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @covers \CountryCity\API\Location::getCountries
     * @covers \CountryCity\API\Location::countries
     */
    public function testGetCountries()
    {
        $location = new Location();
        $countries = $location->getCountries();
        $countries = json_decode($countries);

        $this->assertNotEquals($countries, '');
        $this->assertNotNull($countries);
        $this->assertCount(247, $countries);

        $countries = $location->getCountries('uni');
        $countries = json_decode($countries);
        $this->assertContains('United States', $countries);
    }

    /**
     * Test cities API.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @covers \CountryCity\API\Location::getCities
     * @covers \CountryCity\API\Location::cities
     */
    public function testGetCities()
    {
        $location = new Location();
        $cities = $location->getCities('United States');
        $this->assertFalse(strpos($cities, '"error":"true"'));

        $cities = $location->getCities('United States', 'hou');
        $cities = json_decode($cities);
        $this->assertContains('Houston', $cities);
    }

    /**
     * Test APIs for exceptions.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @covers \CountryCity\API\Location::getCities
     * @covers \CountryCity\API\Location::cities
     * @covers \CountryCity\API\Location::getCountries
     * @covers \CountryCity\API\Location::countries
     */
    public function testErrors()
    {
        // test wrong country name
        $location = new Location();
        $output = json_decode($location->getCities('does_not_exist'));
        $this->assertEquals($output->error, "true");

        // test wrong country name
        $location = new Location();
        $location::$file = '';
        $output = json_decode($location->getCities('India'));
        $this->assertEquals($output->error, "true");
        $output = json_decode($location->getCountries());
        $this->assertEquals($output->error, "true");
    }

    /**
     * Test mb_search function
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     * @covers \CountryCity\API\Location::mb_search
     */
    public function testMbSearch()
    {
        $location = new Location();
        $this->assertTrue($location->mb_search('apple', 'APPL') !== false);
        $this->assertTrue($location->mb_search('homé', 'home') !== false);
    }
}
