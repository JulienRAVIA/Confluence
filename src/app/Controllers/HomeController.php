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
    public function index() 
    {
        $types = $this->db->getTypes();
        
        echo $this->render('index.html.twig', compact('types'));
    }

    public function cgu() 
    {
        echo $this->render('cgu.html.twig');
    }

    public function lang($request)
    {
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
        $this->session->set('lang', $request['lang']);
        $referer = strtr($referer, ['/fr' => '/en', '/en' => '/fr']);

        header('Location: '.$referer);
    }

    public function accessibility()
    {
        if($this->session->get('accessibility') === null) {
            $this->session->set('accessibility', true);
        } else {
            $this->session->set('accessibility', !$this->session->get('accessibility'));
        }

        var_dump($this->session->get('accessibility'));
    }
}
