<?php

namespace App\Controllers;

/**
 * Controller Discover page
 */
class DiscoverController extends BaseController
{
    /**
     * Display homepage
     */
    public function index()
    {
        $types = $this->db->getTypes();
        $lieux = $this->db->getLieuxOnly();

        return $this->render('decouvrir.html.twig', compact('lieux','types'));
    }
}
