<?php

namespace App\Controllers;

/**
 * AboutController
 */
class AboutController extends BaseController
{
    /**
     * Affiche la page "A Propos"
     */
    public function index()
    {
        return $this->render('about.html.twig');
    }
}
