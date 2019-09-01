<?php

namespace CountryCity\API;


use JsonMachine\JsonMachine;
use Exception;

/**
 * This class handles location data.
 *
 * Class Location
 * @package CountryCity\API
 */
class Location
{
    /**
     * Location constructor.
     * @param $filename
     */
    public function __construct($filename)
    {
        /** @var array $this ->data */
        $this->file = $filename;
    }

    /**
     * Return the json encoded list of all countries.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @return string
     */
    public function getAllCountries()
    {
        try {
            $allCountries = $this->countries();
        } catch (Exception $exception) {
            return json_encode(["error" => "true", "message" => $exception->getMessage()]);
        }

        return json_encode($allCountries, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Return the json encoded list of all cities in a country.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @param  $countryName
     * @return string
     */
    public function getAllCities($countryName)
    {
        $countryName = trim(stripslashes(ucwords($countryName)));

        try {
            $allCities = $this->cities($countryName);
        } catch (Exception $exception) {
            return json_encode(["error" => "true", "message" => $exception->getMessage()]);
        }

        return json_encode($allCities, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Return the array containing all countries.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @return array
     * @throws Exception
     */
    private function countries()
    {
        if (!$this->file) {
            throw new Exception('Invalid data filename');
        }

        $data = JsonMachine::fromFile($this->file);
        $countries = array_keys(iterator_to_array($data, true));

        sort($countries);
        return $countries;
    }

    /**
     * Returns the array containing all cities in a country.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     *
     * @param $countryName
     * @return array
     * @throws Exception
     */
    private function cities($countryName)
    {
        if (!$this->file) {
            throw new Exception('Invalid data filename');
        }

        $data = JsonMachine::fromFile($this->file);

        $cities = [];
        $found = false;
        foreach ($data as $key => $value) {
            if($countryName == ucwords($key)) {
                $found = true;
                $cities = $value;
                break;
            }
        }

        if(!$found) {
            throw new Exception('Invalid country name: '. $countryName);
        }

        sort($cities);

        return $cities;
    }
}
