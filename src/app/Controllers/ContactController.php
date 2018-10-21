<?php

namespace App\Controllers;

use App\MailboxLayer;

class ContactController extends BaseController
{
    const EMAIL_ADDRESS = 'julien.ravia@gmail.com';
    const AUTH_EMAIL = 'sio.bonaparte@gmail.com';
    const AUTH_PASSWORD = 'sCAtenTU';
    const HOST = 'smtp.gmail.com';

    public function index()
    {
        echo $this->render('contact.html.twig');
    }

    public function send() 
    {
        /**
         * Déclaration des champs du formulaire
         */
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
                'min' => 5,
                'max' => 50,
                'value' => filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING)
            ],
            'name' => [
                'required' => true,
                'min' => 1,
                'max' => 25,
                'value' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING)
            ],
            'firstname' => [
                'required' => true,
                'min' => 1,
                'max' => 25,
                'value' => filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)
            ],
        ];

        /**
         * On vérifie pour chaque champ normalement rempli du formulaire qu'il soit correctement rempli 
         */
        foreach ($fields as $key => $field) {
            if($key == 'email_address')
                $email = new MailboxLayer($field['value']);
            if($this->isSpam($field['value'], $field['min'], $field['max']) || ($field['required'] && empty($field['value']))) {
                echo json_encode(array('message' => 'Un des champs n\'est pas correctement rempli', 'code' => 'error'));
                return false;
            }
        }

        /**
         * On vérifie que l'adresse mail soit valide
         */
        if(!$email->isValid()) {
            echo json_encode(array('message' => 'Cette adresse mail n\'est pas valide', 'code' => 'error'));
            return false;
        }
        
        // Identifiants
        $this->mailer->isSMTP(); 
        $this->mailer->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mailer->Host = self::HOST;  // Specify main and backup SMTP servers
        $this->mailer->Username = self::AUTH_EMAIL;                 // SMTP username
        $this->mailer->Password = self::AUTH_PASSWORD;                           // SMTP password
        $this->mailer->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $this->mailer->Port = 587;                                    // TCP port to connect to
        
        // Destinataires et expediteurs
        $this->mailer->setFrom($email->getEmailAddress(), 'Mailer');
        $this->mailer->addAddress(self::EMAIL_ADDRESS, 'Joe User');
        $this->mailer->addReplyTo($email->getEmailAddress(), 'Information');
        
        // Contenu du mail
        $this->mailer->isHTML(true);                                  // Set email format to HTML
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
    
    public function isSpam(string $text, int $minLength = 10, int $maxLength = 50)
    {
        return (strlen($text) <= $minLength) || (strlen($text) >= $maxLength);
    }
}
