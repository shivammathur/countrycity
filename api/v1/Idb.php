<?php

namespace CountryCity\API;


interface Idb
{
    public function connect($databaseName, $collectionName);
}