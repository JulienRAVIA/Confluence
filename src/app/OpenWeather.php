<?php

namespace App;

class OpenWeather
{
    const API_KEY = 'cb0611ac707099f9e5824b0954cdd093';

    public function __construct($city, $country, $units = 'metric') 
    {
        $parameters = implode(',', compact('city', 'country'));
        
        $query = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q='.$parameters.'&units='.$units.'&lang='.$country.'&appid='.self::API_KEY);
        if($query) {
            $this->json_response  = json_decode($query);
        } else {
            throw new \Exception('Erreur lors de la récupération des données de météo');
        }
    }

    public function dump()
    {
        var_dump($this->json_response);
    }

    public function getTemperature()
    {
        $temperatures = array(
            'min' => $this->json_response['main']['temp_min'],
            'max' => $this->json_response['main']['temp_max'],
            'now' => $this->json_response['main']['temp']
        );
        return $temperatures;
    }

    public function getSunrise()
    {
        $date = new \DateTime();
        $date->setTimestamp($this->json_response['sys']['sunrise']);

        return $date;
    }

    public function getSunset()
    {
        $date = new \DateTime();
        $date->setTimestamp($this->json_response['sys']['sunset']);

        return $date;
    }

    public function getWind()
    {
        return $this->json_response['wind'];
    }
    
    public function getHumidity()
    {
        return $this->json_response['main']['humidity'];
    }
    
    public function getWeather()
    {
        $weather = array(
            'short_description' => $this->json_response['weather'][0]['main'],
            'image' => $this->json_response['weather'][0]['icon'],
            'description' => ucfirst($this->json_response['weather'][0]['description'])
        );
        return $weather;
    }
}
