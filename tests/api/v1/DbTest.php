<?php

namespace CountryCity\Tests\API;

use CountryCity\API\Db;
use MongoDB\Client;
use MongoDB\Collection;

class DbTest extends \PHPUnit_Framework_TestCase
{
    protected static $databaseName = 'countrycity';
    protected static $collection = 'geo';

    /**
     * Test MongoDB connect wrapper.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @covers \CountryCity\API\Db::connect()
     * @covers \CountryCity\API\Db::mongoConnect()
     */
    public function testConnect()
    {
        $conn = (new Db())->connect(self::$databaseName, self::$collection);

        $this->assertNotNull($conn);
        $this->assertTrue($conn instanceof Collection);
    }

    /**
     * Test MongoDB client wrapper.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @covers \CountryCity\API\Db::client()
     * @covers \CountryCity\API\Db::mongoClient()
     */
    public function testClient()
    {
        $client = (new Db())->client();

        $this->assertNotNull($client);
        $this->assertTrue($client instanceof Client);
    }

    /**
     * Test MongoDB client wrapper for Exceptions.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @expectedException \Exception
     * @covers \CountryCity\API\Db::client()
     * @covers \CountryCity\API\Db::mongoClient()
     */
    public function testClientException()
    {
        /** @var \MongoDB\Client $client */
        $client = (new Db())->client(true);
    }

    /**
     * Test MongoDB connect wrapper for Exceptions.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @expectedException \Exception
     * @covers \CountryCity\API\Db::connect()
     * @covers \CountryCity\API\Db::mongoConnect()
     */
    public function testConnectException()
    {
        $conn = (new Db())->connect('', '');
    }
}
