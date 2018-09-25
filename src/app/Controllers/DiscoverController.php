<?php

namespace App\Controllers;

class DiscoverController extends BaseController
{
    public function index()
    {
        $types = $this->db->getTypes();

        return $this->render('decouvrir.html.twig', compact('types'));
    }
}
