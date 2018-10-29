<?php

namespace App\Controllers;

use App\MailboxLayer;

/**
 * Contact Controller
 */
class ContactController extends BaseController
{
    // Default recipient
    const EMAIL_ADDRESS = 'julien.ravia@gmail.com';

    /**
     * Check form fields & send email
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
                'value' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING)
            ],
            'firstname' => [
                'required' => true,
                'min' => 1,
                'max' => 25,
                'value' => filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)
            ],
        ];

        // We check if every field is correctly filled and is valid
        foreach ($fields as $key => $field) {
            if($key == 'email_address')
                $email = new MailboxLayer($field['value']);
            if($this->isSpam($field['value'], $field['min'], $field['max']) || ($field['required'] && empty($field['value']))) {
                echo json_encode(array('message' => 'Un des champs n\'est pas correctement rempli '. $key, 'code' => 'error'));
                return false;
            }
        }

        // We check if email address is valid
        if(!$email->isValid()) {
            echo json_encode(array('message' => 'Cette adresse mail n\'est pas valide', 'code' => 'error'));
            return false;
        }
        
        // Credentials
        $this->mailer->isSMTP(); 
        $this->mailer->SMTPAuth = true;                          // Enable SMTP authentication
        $this->mailer->Host = getenv('SMTP_HOST');               // Specify main and backup SMTP servers
        $this->mailer->Username = getenv('SMTP_USER');           // SMTP username
        $this->mailer->Password = getenv('SMTP_PASSWORD'); ;     // SMTP password
        $this->mailer->SMTPSecure = 'tls';                       // Enable TLS encryption, `ssl` also accepted
        $this->mailer->Port = getenv('SMTP_PORT');               // TCP port to connect to
        
        // Recipients & sender
        $this->mailer->setFrom($email->getEmailAddress(), 'Mailer');
        $this->mailer->addAddress(self::EMAIL_ADDRESS);
        $this->mailer->addReplyTo($email->getEmailAddress());
        
        // Mail body
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
    
    /**
     * Check if field is correctly filled 
     *
     * @param string $text Text to check
     * @param int $minLength Min text length
     * @param int $maxLength Max text length
     *
     * @return bool
     */
    public function isSpam(string $text, int $minLength = 10, int $maxLength = 50)
    {
        return (strlen($text) <= $minLength) || (strlen($text) >= $maxLength);
    }
}
