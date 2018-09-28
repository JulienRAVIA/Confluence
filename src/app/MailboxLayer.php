<?php

namespace App;

class MailboxLayer
{
    /**
     * Clé API OpenWeather
     */
    const API_KEY = '0298171f62e0037d75944220b3f3b4f9';

    public function __construct(string $email)
    {
        $query = file_get_contents('http://apilayer.net/api/check?access_key='.self::API_KEY.'&email='.$email.'&smtp=1&format=1');
        if($query) {
            $this->json_result = json_decode($query);
        } else {
            throw new \Exception('Erreur lors de la récupération des données');
        }
    }

    public function isFormatValid()
    {
        return (boolean) $this->json_result->format_valid;
    }

    public function isMxFound()
    {
        return (boolean) $this->json_result->mx_found;
    }

    public function smtpCheck()
    {
        return (boolean) $this->json_result->smtp_check;
    }

    public function getEmailAddress()
    {
        return (string) $this->json_result->email;
    }

    public function getUser()
    {
        return (string) $this->json_result->user;
    }

    public function getDomain()
    {
        return (string) $this->json_result->user;
    }

    public function isValid()
    {
        if(!$this->isFormatValid())
            return false;
        if(!$this->isMxFound()) 
            return false;
        if(!$this->SmtpCheck())
            return false;

        return true;
    }

    public function dump()
    {
        var_dump($this->json_result);
    }
}
