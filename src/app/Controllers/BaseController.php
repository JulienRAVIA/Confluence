<?php

namespace App\Controllers;

use App\Database;
use App\Twig;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * BaseController 
 */
abstract class BaseController
{
    /**
     * Création des variables de service
     */
    public function __construct()
    {
        try {
            $this->db = Database::getInstance();
            $this->twig = new Twig();
            $this->mailer = new PHPMailer();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Retourne template compilé
     *
     * @param string $view Chemin de la vue
     * @param array  $attributes Paramètres à passer
     *
     * @return void
     */
    protected function render(string $view, $attributes = null) {
        return $this->twig->render($view, $attributes);
    }
}