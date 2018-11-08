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
        
        echo $this->render('index.html.twig', compact('types'));
    }

    public function cgu() {
    	echo $this->render('cgu.html.twig');
    }
}
