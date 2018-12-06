<?php

namespace App\Controllers;

use League\Glide\ServerFactory;

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

    /**
     * Retourne réponse JSON avec tous les types de lieux
     *
     * @method GET|POST
     */
    public function lieu($request)
    {
        $id = $request['id'];
        $lieu = $this->db->getLieu($id);

        if($lieu) {
            echo json_encode(['code' => 'success', 'data' => $lieu]);
        } else {
            echo json_encode(['code' => 'error']);
        }
    }

    public function photos($request)
    {
        $path = $request['path'];

        $server = ServerFactory::create([
            'source' => __DIR__.'/../../../public/img/photos',
            'cache' => __DIR__.'/../../../cache/glide',
        ]);
        
        if($server->sourceFileExists($path)) {
            $img = $server->outputImage($path, $_GET);
        } else {
            header('HTTP/1.0 404 Not Found', true, 404);
        }
    }

    public function stationsAuto()
    {
        $file = file_get_contents('auto.json');
        $stations = json_decode($file);
        $types = ['Bluely', 'Citiz LPA'];

        foreach($stations as $station)
        {
            $type = $station->fields->typeautopa;
            $nom = $station->fields->nom;
            $address = $station->fields->adresse.' 69002 Lyon';
            $coords = implode(', ', array_reverse($station->geometry->coordinates));

            if(in_array($type, $types))
            {
                $req = $this->db->addLieu(5, $type.' '.$nom, 'Station autopartage '.$type.' '.$nom.' <br> Adresse : '.$address,
                'Car sharing station '.$type.' '.$nom.' <br> Adress : '.$address, $coords, null);
                if($req){
                    echo 'inséré';
                }
            }
        }
    }
}
