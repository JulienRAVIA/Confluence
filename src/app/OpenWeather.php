<?php

namespace App;

use Curl\Curl;

/**
 * Classe API pour fonctionner avec OpenWeather
 * Permet de récupérer les données météo d'une ville
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
     * @param string $city Ville voulue
     * @param string $country Pays
     * @param string $country Langue
     * @param string $units Unité de température
     */
    public function __construct(string $city, string $country, string $lang = 'fr', string $units = 'metric') 
    {
        $this->apiKey = getenv('API_OPENWEATHER');
        
        $params = http_build_query([ 
            'q' => implode(',', compact('city', 'country')),
            'units' => $units,
            'lang' => $lang,
            'appId' => $this->apiKey
        ]);
        if($req = file_get_contents('http://api.openweathermap.org/data/2.5/weather?'.$params)) {
            $this->response = json_decode($req, false);
        } else {
            throw new \Exception('Impossible d\'obtenir les données météo');
        }
    }

    /**
     * Retourne le nom de la ville
     *
     * @return string
     */
    public function getName()
    {
        return (string) $this->response->name;
    }

    /**
     * Retourne températures (min, max, actuelle)
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
     * Retourne l'heure de lever du soleil
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
     * Retourne heure coucher du soleil
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
     * Retourne données de vent
     *
     * @return array
     */
    public function getWind()
    {
        return $this->response->wind;
    }
    
    /**
     * Retourne données humidité
     *
     * @return void
     */
    public function getHumidity()
    {
        return $this->response->main->humidity;
    }
    
    /**
     * Retourne info météo (image, description)
     *
     * @return array
     */
    public function getWeather()
    {
        $weather = array(
            'short_description' => $this->response->weather[0]->main,
            'icon' => $this->getIcon($this->response->weather[0]->icon),
            'description' => ucfirst($this->response->weather[0]->description)
        );

        return $weather;
    }

    /**
     * Dump réponse
     *
     * @return void
     */
    public function dump()
    {
        var_dump($this->response);
    }

    /**
     * Retourne l'icone FontAwesome correspondant à ;'image renvoyées
     *
     * @param string $icon
     *
     * @return string Icone
     */
    private function getIcon(string $icon)
    {
        $icons = [
            '01d' => 'sun',
            '01n' => 'moon',
            '02d' => 'cloud-sun',
            '02n' => 'cloud-moon',
            '03d' => 'cloud',
            '03n' => 'cloud',
            '04d' => 'clouds',
            '04n' => 'clouds',
            '09n' => 'cloud-showers-heavy',
            '09n' => 'cloud-showers-heavy',
            '10n' => 'cloud-sun-rain',
            '10d' => 'cloud-sun-rain',
            '11n' => 'thunderstorm',
            '11d' => 'thunderstorm',
            '13d' => 'cloud-snow',
            '13n' => 'cloud-snow',
            '50d' => 'water',
            '50n' => 'water',
        ];

        if(!array_key_exists($icon, $icons))
        {
            return null;
        }
        return $icons[$icon];
    }
}
