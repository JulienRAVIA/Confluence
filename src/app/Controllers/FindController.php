<?php

namespace App\Controllers;

/**
 * Controller de la page Se repérer
 */
class FindController extends BaseController
{
    /**
     * Page d'accueil
     */
    public function index()
    {
        $types = $this->db->getTypes();

        return $this->render('se_reperer.html.twig', compact('types'));
    }
}
