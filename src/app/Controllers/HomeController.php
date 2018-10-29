<?php

namespace App\Controllers;

/**
 * Controller homepage
 */
class HomeController extends BaseController 
{
    /**
     * Display homepage
     */
    public function index() {
        $types = $this->db->getTypes();

        // $weather = new \App\OpenWeather('Paris', 'fr');
        // $weather->dump();
        echo $this->render('index.html.twig', compact('types'));
    }
}
