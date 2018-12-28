<?php

namespace App\Controllers;

use League\Glide\ServerFactory;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

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

    /**
     * Altération d'une photo à partir de son nom de fichier' (redimensionnement à la volée)
     *
     * @param array $request
     * 
     * @method GET
     */
    public function photos($request)
    {
        $path = $request['path'];
        $source = __DIR__.'/../../../public/img/photos';

        $adapter = new Local($source);
        $fileSystem = new Filesystem($adapter);
        $server = ServerFactory::create([
            'source' => $source,
            'cache' => __DIR__.'/../../../cache/glide',
            'max_image_size' => 3500*3500,
        ]);
        
        if($server->sourceFileExists($path)) {
            if(count($_GET)) {
                $img = $server->outputImage($path, $_GET);
            } else {
                $img = $server->outputImage($path, ['w' => 1500]);
            }
        } else {
            header('HTTP/1.0 404 Not Found', true, 404);
        }
    }
}
