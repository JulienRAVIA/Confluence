<?php

namespace App\Controllers;

use App\MailboxLayer;
use App\Util\Regex;

/**
 * Contact Controller
 */
class ContactController extends BaseController
{
    // Destinataire par défaut
    const EMAIL_ADDRESS = 'julien.ravia@gmail.com';

    /**
     * Vérification du formulaire et envoi du mail
     *
     * @return void
     */
    public function send() 
    {
        // Form fields
        $fields = [
            'email_address' => [
                'required' => true,
                'min' => 1,
                'max' => 50,
                'value' => filter_input(INPUT_POST, 'email_address', FILTER_SANITIZE_STRING)
            ],
            'message' => [
                'required' => true,
                'min' => 10,
                'max' => 500,
                'value' => filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING)
            ],
            'subject' => [
                'required' => true,
                'min' => 1,
                'max' => 25,
                'value' => filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING)
            ],
            'name' => [
                'required' => true,
                'min' => 1,
                'max' => 25,
                'value' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING),
                'regex' => '/^[a-zA-Z]+$/'
            ],
            'firstname' => [
                'required' => true,
                'min' => 1,
                'max' => 25,
                'value' => filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING),
                'regex' => '/^[a-zA-Z]+$/'
            ],
        ];

        // On vérifie si chaque champ est correctement renseigné
        foreach ($fields as $key => $field) {
            if($this->isSpam($field['value'], $field['min'], $field['max']) || ($field['required'] && empty($field['value']))) {
                echo json_encode(array('message' => 'Un des champs n\'est pas correctement rempli '. $key, 'code' => 'error'));
                return false;
            }
            if(isset($field['regex'])) {
                $regex = new Regex($field['regex']);
                if(!$regex->isMatchingWith($field['value']) && !$regex->isValidRegularExpression()) {
                    echo json_encode(array('message' => 'Certains champs ne contiennent pas des données valides', 'code' => 'error'));
                    return false;
                }
            }
        }
        
        // On vérifie si l'adresse mail renseignée est valide
        $email = new MailboxLayer($fields['email_address']['value']);
        if(!$email->isValid()) {
            echo json_encode(array('message' => 'Cette adresse mail n\'est pas valide', 'code' => 'error'));
            return false;
        }
        
        // Identifiants
        $this->mailer->isSMTP(); 
        $this->mailer->SMTPAuth = true;                          // Enable SMTP authentication
        $this->mailer->Host = getenv('SMTP_HOST');               // Specify main and backup SMTP servers
        $this->mailer->Username = getenv('SMTP_USER');           // SMTP username
        $this->mailer->Password = getenv('SMTP_PASSWORD'); ;     // SMTP password
        $this->mailer->SMTPSecure = 'tls';                       // Enable TLS encryption, `ssl` also accepted
        $this->mailer->Port = getenv('SMTP_PORT');               // TCP port to connect to
        
        // Destinataires & expediteurs
        $this->mailer->setFrom($email->getEmailAddress(), 'Mailer');
        $this->mailer->addAddress(self::EMAIL_ADDRESS);
        $this->mailer->addReplyTo($email->getEmailAddress());
        
        // Corps du mail
        $this->mailer->isHTML(true);
        $this->mailer->Subject = $fields['subject']['value'];
        $this->mailer->Body = strip_tags($fields['message']['value']);
        $this->mailer->AltBody = strip_tags($fields['message']['value']);
        
        try {
            if($this->mailer->send()) {
                echo json_encode(array('code' => 'success', 'message' => 'Votre mail à été envoyé, félicitations !'));
                return true;
            } else {
                echo json_encode(array('code' => 'error', 'message' => 'Votre mail n\'à pas été envoyé, réessayez !'));
                return false;
            }
        } catch(Exception $e) {
            echo $this->mailer->errorInfo;
        }        
    }
    
    /**
     * On vérifie si un champ est correctement renseigné
     *
     * @param string $text Texte/contenu à verifier
     * @param int $minLength Longueur minimale
     * @param int $maxLength Longueur maximale
     *
     * @return bool
     */
    public function isSpam(string $text, int $minLength = 10, int $maxLength = 50)
    {
        return (strlen($text) <= $minLength) || (strlen($text) >= $maxLength);
    }
}
