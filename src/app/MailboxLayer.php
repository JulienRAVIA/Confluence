<?php

namespace App;

use Curl\Curl;

/**
 * MailboxLayer API Class for checking if an email is valid
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
     * @param string $email Email to check
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
     * Return if format email address is valid
     *
     * @return bool
     */
    public function isFormatValid()
    {
        return (boolean) $this->response->format_valid;
    }

    /**
     * Return if MX Records are found
     *
     * @return bool
     */
    public function isMxFound()
    {
        return (boolean) $this->response->mx_found;
    }

    /**
     * Return if SMTP is checked
     *
     * @return void
     */
    public function smtpCheck()
    {
        return (boolean) $this->response->smtp_check;
    }
    
    /**
     * Return email address
     *
     * @return void
     */
    public function getEmailAddress()
    {
        return (string) $this->response->email;
    }

    /**
     * Return email user
     *
     * @return void
     */
    public function getUser()
    {
        return (string) $this->response->user;
    }

    /**
     * Return email domain
     *
     * @return void
     */
    public function getDomain()
    {
        return (string) $this->response->user;
    }

    /**
     * Return if user email address is valid
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
     * Dump response
     */
    public function dump()
    {
        var_dump($this->response);
    }
}
