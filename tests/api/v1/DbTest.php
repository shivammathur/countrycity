<?php

namespace CountryCity\Tests\API;

use Exception;
use CountryCity\API\Db;
use MongoDB\Client;
use MongoDB\Collection;
use PHPUnit\Framework\TestCase;

class DbTest extends TestCase
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
     * @throws Exception
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @covers \CountryCity\API\Db::client()
     * @covers \CountryCity\API\Db::mongoClient()
     */
    public function testClient()
    {
        try {
            $client = (new Db())->client();
            $this->assertNotNull($client);
            $this->assertTrue($client instanceof Client);
        } catch (Exception $e) {
            $this->assertEquals("Data insufficient to connect", $e->getMessage());
        }
    }

    /**
     * Test MongoDB client wrapper for Exceptions.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @covers \CountryCity\API\Db::client()
     * @covers \CountryCity\API\Db::mongoClient()
     */
    public function testClientException()
    {
        /** @var Client $client */
        try {
            $client = (new Db())->client(true);
            $this->assertNull($client);
        } catch (Exception $e) {
            $this->assertEquals("Data insufficient to connect", $e->getMessage());
        }

    }

    /**
     * Test MongoDB connect wrapper for Exceptions.
     *
     * @throws Exception
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @covers \CountryCity\API\Db::connect()
     * @covers \CountryCity\API\Db::mongoConnect()
     */
    public function testConnectException()
    {
        try {
            $conn = (new Db())->connect('', '');
            $this->assertNull($conn);
        } catch (Exception $e) {
            $this->assertEquals("MongoDB process is not running", $e->getMessage());
        }
    }
}
