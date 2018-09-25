<?php

namespace App\Controllers;

class FindController extends BaseController
{
    public function index()
    {
        $types = $this->db->getTypes();

        return $this->render('se_reperer.html.twig', compact('types'));
    }
}
