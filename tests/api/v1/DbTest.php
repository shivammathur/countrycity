<?php

namespace CountryCity\Tests\API;

class DbTest extends \PHPUnit_Framework_TestCase
{
    protected static $databaseName = 'countrycity';
    protected static $collection   = 'geo';

    public function testConnect(){
        $conn = (new \CountryCity\API\Db())->connect(self::$databaseName, self::$collection);
        $this->assertNotNull($conn);
        $this->assertTrue($conn instanceof \MongoDB\Collection);
    }

    public function testClient(){
        $client = (new \CountryCity\API\Db())->client();
        $this->assertNotNull($client);
        $this->assertTrue($client instanceof \MongoDB\Client);
    }
}
