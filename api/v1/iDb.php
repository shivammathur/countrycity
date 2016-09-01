<?php

namespace CountryCity\API;


interface iDb
{
    public function connect($databaseName, $collectionName);
}