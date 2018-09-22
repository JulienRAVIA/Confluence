<?php

namespace App\Controllers;

use App\Database;
use App\Twig;

class BaseController
{
    public function __construct($check = null)
    {
        try {
            $this->db = Database::getInstance();
            $this->twig = new Twig();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function render($view, $attributes = null) {
        return $this->twig->render($view, $attributes);
    }
}