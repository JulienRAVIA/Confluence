<?php

namespace App\Controllers;

/**
 * Api Controller
 */
class ApiController extends BaseController 
{
    /**
     * Retourne réponse JSON avec les lieux par types
     * 
     * @method POST
     */
    public function lieuxByTypes() {
        $types = $_POST['types'];

        $lieux = $this->db->getLieuxByTypes($types);
        
        echo json_encode($lieux);
    }
    
    /**
     * Retourne réponse JSON avec les lieux du type passé en paramètre
     * 
     * @method GET
     */
    public function lieuxByType($request) {
        $type = $request['id'];
        $lieux = $this->db->getLieuxByType($type);
        
        echo json_encode($lieux);
    }

    /**
     * Retourne réponse JSON avec tous les types de lieux
     *
     * @method GET|POST
     */
    public function types()
    {
        $types = $this->db->getTypes();
        
        echo json_encode($types);
    }
}
