<?php

namespace App\Controllers;

/** Controlleur de la page Découvrir */
class DiscoverController extends BaseController
{
    /**
     * Page d'accueil
     */
    public function index()
    {
        $types = $this->db->getTypes();
        $lieux = $this->db->getLieuxOnly();
        return $this->render('decouvrir.html.twig', compact('lieux','types'));
    }
}
