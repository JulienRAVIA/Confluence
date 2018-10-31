<?php

namespace App\Controllers;

/**
 * DiscoverController
 */
class DiscoverController extends BaseController
{
    /**
     * Affiche la page "Découvrir"
     */
    public function index()
    {
        $types = $this->db->getTypes();
        $lieux = $this->db->getLieuxOnly();

        return $this->render('decouvrir.html.twig', compact('lieux','types'));
    }
}
