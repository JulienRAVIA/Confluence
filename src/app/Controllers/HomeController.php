<?php

namespace App\Controllers;

/**
 * Controleur de la page d'accueil
 */
class HomeController extends BaseController 
{
    /**
     * On affiche la page d'accueil si connecté, 
     * sinon on affiche la page de connexion
     */
    public function index() {
        $types = $this->db->getTypes();

        // $weather = new \App\OpenWeather('Paris', 'fr');
        // $weather->dump();
        echo $this->render('index.html.twig', compact('types'));
    }
}
