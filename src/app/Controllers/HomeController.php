<?php

namespace App\Controllers;

/**
 * HomeController
 */
class HomeController extends BaseController 
{
    /**
     * Affiche la page d'accueil
     */
    public function index() {
        $types = $this->db->getTypes();

        // $weather = new \App\OpenWeather('Paris', 'fr');
        // $weather->dump();
        echo $this->render('index.html.twig', compact('types'));
    }
}
