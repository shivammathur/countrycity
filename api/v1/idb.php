<?php

namespace CountryCity\API;


interface idb
{
    public function connect($databaseName, $collectionName);
}