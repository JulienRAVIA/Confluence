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
        $lang = $this->session->get('lang');
        if($lang == 'fr') {
            echo $this->render('cgu_en.html.twig');
        } else {
            echo $this->render('cgu.html.twig');
        }
    }

    public function lang($request)
    {
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/accueil';
        $this->session->set('lang', $request['lang']);

        header('Location: /');
    }
}
