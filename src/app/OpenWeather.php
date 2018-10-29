<?php

namespace App;

use Curl\Curl;

/**
 * OpenWeather API Class for getting City Weather
 */
class OpenWeather
{
    /**
     * @var string $apiKey Clé API OpenWeather
     */
    private $apiKey;

    /**
     * @var $response
     */
    private $response;

    /**
     * @param string $city City wanted
     * @param string $country Country
     * @param string $units Unit for temperature (metric)
     */
    public function __construct(string $city, string $country, $units = 'metric') 
    {
        $this->apiKey = getenv('API_OPENWEATHER');
        
        $curl = new Curl();
        $curl->get('http://api.openweathermap.org/data/2.5/weather', array(
                    'q' => implode(',', compact('city', 'country')),
                    'units' => $units,
                    'lang' => $country,
                    'appId' => $this->apiKey
            )
        );
        if ($curl->error) {
            throw new \Exception('Erreur lors de la récupération des données de météo');
        } else {
            $this->response = $curl->response;
        }
    }

    /**
     * Return temperatures
     *
     * @return array
     */
    public function getTemperatures()
    {
        $temperatures = array(
            'min' => $this->response->main->temp_min,
            'max' => $this->response->main->temp_max,
            'now' => $this->response->main->temp
        );

        return $temperatures;
    }

    /**
     * Return sunrise time
     *
     * @return \DateTime
     */
    public function getSunrise()
    {
        $date = new \DateTime();
        $date->setTimestamp($this->response->sys->sunrise);

        return $date;
    }

    /**
     * Return sunset time
     *
     * @return \DateTime
     */
    public function getSunset()
    {
        $date = new \DateTime();
        $date->setTimestamp($this->response->sys->sunset);

        return $date;
    }

    /**
     * Return Wind datas
     *
     * @return array
     */
    public function getWind()
    {
        return $this->response->wind;
    }
    
    /**
     * Return humidity
     *
     * @return void
     */
    public function getHumidity()
    {
        return $this->response->main->humidity;
    }
    
    /**
     * Return weather (description, image)
     *
     * @return array
     */
    public function getWeather()
    {
        $weather = array(
            'short_description' => $this->response->weather[0]->main,
            'image' => $this->response->weather[0]->icon,
            'description' => ucfirst($this->response->weather[0]->description)
        );

        return $weather;
    }

    /**
     * Dump response
     *
     * @return void
     */
    public function dump()
    {
        var_dump($this->response);
    }
}
