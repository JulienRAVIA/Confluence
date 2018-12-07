<?php

namespace App\Controllers;

use App\Twig;
use App\Database;
use App\OpenWeather;
use App\Util\SessionManager;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * BaseController 
 */
abstract class BaseController
{
    /**
     * Création des variables de service
     */
    public function __construct(string $lang = 'fr')
    {
        try {
            $this->db = Database::getInstance();
            $this->twig     =   new Twig($lang);
            $this->mailer   =   new PHPMailer();
            $this->session  =   new SessionManager();
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