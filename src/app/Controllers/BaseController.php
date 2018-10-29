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
     * Create services
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
     * Return compiled template
     *
     * @param string $view View path
     * @param array  $attributes Parameters to pass
     *
     * @return void
     */
    protected function render(string $view, $attributes = null) {
        return $this->twig->render($view, $attributes);
    }
}