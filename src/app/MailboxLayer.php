<?php

namespace App;

use Curl\Curl;

/**
 * Classe API pour fonctionner avec MailBoxLayer
 * Vérifie la validité d'une adresse mail
 */
class MailboxLayer
{
    /**
     * @var string $apiKey
     */
    private $apiKey;

    /**
     * @var $response
     */
    private $response;

    /**
     * @param string $email Email à vérifier
     */
    public function __construct(string $email)
    {
        $this->apiKey = getenv('API_MAILBOX_LAYER');

        $curl = new Curl();
        $curl->get('http://apilayer.net/api/check', array(
                'access_key' => $this->apiKey,
                'email' => $email,
                'smtp' => 1,
                'format' => 1
            )
        );

        if ($curl->error) {
            throw new \Exception('Erreur lors de la récupération des données');
        } else {
            $this->response = $curl->response;
        }
    }

    /**
     * Return si l'adresse mail renseignée est au format valide
     *
     * @return bool
     */
    public function isFormatValid()
    {
        return (boolean) $this->response->format_valid;
    }

    /**
     * Retourne si le DNS email est valide
     *
     * @return bool
     */
    public function isMxFound()
    {
        return (boolean) $this->response->mx_found;
    }

    /**
     * Retourne si le SMTP est valide
     *
     * @return void
     */
    public function smtpCheck()
    {
        return (boolean) $this->response->smtp_check;
    }
    
    /**
     * Retourne l'adresse email
     *
     * @return void
     */
    public function getEmailAddress()
    {
        return (string) $this->response->email;
    }

    /**
     * Retourne le nom utilisateur de l'adresse mail (avant @)
     *
     * @return void
     */
    public function getUser()
    {
        return (string) $this->response->user;
    }

    /**
     * Retourne le domaine de l'adresse mail
     *
     * @return void
     */
    public function getDomain()
    {
        return (string) $this->response->user;
    }

    /**
     * Retourne si l'adresse email renseignée est valide
     *
     * @return bool
     */
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

    /**
     * Dump réponse
     */
    public function dump()
    {
        var_dump($this->response);
    }
}
