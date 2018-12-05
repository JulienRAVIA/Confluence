<?php

namespace App\Controllers;

/**
 * AproposController
 */
class AproposController extends BaseController
{
    /**
     * Affiche la page "A Propos"
     */
    public function index()
    {
        return $this->render('a_propos.html.twig');
    }
}
