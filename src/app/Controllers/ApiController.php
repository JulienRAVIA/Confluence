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
        
        echo json_encode($lieux);
    }
    
    /**
     * On recupère les lieux à partir d'un type de lieu
     * qu'on renvoie au format JSON
     * 
     * @return array $request
     */
    public function lieuxByType($request) {
        $type = $request['id'];
        $lieux = $this->db->getLieuxByType($type);
        
        echo json_encode($lieux);
    }

    /**
     * On récupère toutes les informations d'un
     *
     * @return void
     */
    public function types()
    {
        $types = $this->db->getTypes();
        
        echo json_encode($types);
    }
}
