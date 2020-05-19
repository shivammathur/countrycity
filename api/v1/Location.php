<?php

namespace CountryCity\API;


use JsonMachine\JsonMachine;
use Exception;
use function iconv;
use function mb_stripos;
use function preg_replace;

/**
 * This class handles location data.
 *
 * Class Location
 * @package CountryCity\API
 */
class Location
{
    /**
     * @var string $file
     */
    public static string $file = 'data/geo.json';

    /**
     * Return the json encoded list of all countries.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     * @param string|NULL $search
     * @return false|string
     */
    public function getCountries(string $search = NULL)
    {
        try {
            $allCountries = $this->countries($search);
        } catch (Exception $exception) {
            return json_encode(["error" => "true", "message" => $exception->getMessage()]);
        }

        return json_encode($allCountries, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Return the json encoded list of all cities in a country.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     * @param string $countryName
     * @param string|NULL $search
     * @return false|string
     */
    public function getCities(string $countryName, string $search = NULL)
    {
        $countryName = trim(stripslashes(ucwords($countryName)));

        try {
            $allCities = $this->cities($countryName, $search);
        } catch (Exception $exception) {
            return json_encode(["error" => "true", "message" => $exception->getMessage()]);
        }

        return json_encode($allCities, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Return the array containing all countries.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     * @param string $haystack
     * @param string $needle
     * @return bool|false|int
     */
    public function mb_search(string $haystack, string $needle)
    {
        setlocale(LC_ALL, 'en_US.UTF8');
        $haystack = preg_replace('/[\'^`~\"]/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $haystack));
        $needle = preg_replace('/[\'^`~\"]/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $needle));
        return mb_stripos($haystack, $needle);
    }

    /**
     * Return the array containing all countries.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     * @param string|NULL $search
     * @return array
     * @throws Exception
     */
    private function countries(string $search = NULL)
    {
        if (self::$file == '') {
            throw new Exception('Invalid data filename');
        }

        $data = JsonMachine::fromFile(self::$file);
        $countries = array_filter(
            array_keys(iterator_to_array($data, true)),
            fn (string $country) => !$search || $this->mb_search($country, $search) !== false
        );
        sort($countries);
        return $countries;
    }

    /**
     * Returns the array containing all cities in a country.
     *
     * @author Shivam Mathur <shivam_jpr@hotmail.com>
     * @param string $countryName
     * @param string|NULL $search
     * @return array
     * @throws Exception
     */
    private function cities(string $countryName, string $search = NULL)
    {
        if (self::$file == '') {
            throw new Exception('Invalid data filename');
        }

        $data = JsonMachine::fromFile(self::$file);

        $cities = [];
        $found = false;
        foreach ($data as $key => $value) {
            if($countryName == ucwords($key)) {
                $found = true;
                $cities = array_filter(
                    $value,
                    fn (string $city) => !$search || $this->mb_search($city, $search) !== false
                );
                sort($cities);
                break;
            }
        }

        if(!$found) {
            throw new Exception('Invalid country name: '. $countryName);
        }

        return $cities;
    }
}
