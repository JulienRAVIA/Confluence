<?php

namespace App\Controllers;

/**
 * Controller findpage
 */
class FindController extends BaseController
{
    /**
     * Affiche la page "Se repérer"
     */
    public function index()
    {
        $types = $this->db->getTypes();

        return $this->render('se_reperer.html.twig', compact('types'));
    }
}
