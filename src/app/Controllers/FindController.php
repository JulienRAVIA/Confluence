<?php

namespace App\Controllers;

/**
 * Controller findpage
 */
class FindController extends BaseController
{
    /**
     * Dispay homepage
     */
    public function index()
    {
        $types = $this->db->getTypes();

        return $this->render('se_reperer.html.twig', compact('types'));
    }
}
