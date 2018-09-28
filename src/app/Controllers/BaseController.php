<?php

namespace App\Controllers;

use App\Database;
use App\Twig;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Controller de base
 */
class BaseController
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
     * Retourne le template compilé
     *
     * @param string $view Chemin vers la vue
     * @param array  $attributes Paramètres à passer
     *
     * @return void
     */
    public function render($view, $attributes = null) {
        return $this->twig->render($view, $attributes);
    }
}