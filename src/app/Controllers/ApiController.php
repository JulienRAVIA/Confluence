<?php

namespace App\Controllers;

/**
 * Controleur de la page d'accueil
 */
class ApiController extends BaseController 
{
    /**
     * On affiche la page d'accueil si connecté, 
     * sinon on affiche la page de connexion
     */
    public function lieuxByTypes() {
        $types = $_POST['types'];

        $lieux = $this->db->getLieuxByTypes($types);
        
        echo json_encode(array('lieux' => $lieux));
    }
}
