<?php

namespace App\Controllers;

use Cocur\Slugify\Slugify;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;
use Intervention\Image\ImageManager;

// create an image manager instance with favored driver

/**
 * DiscoverController
 */
class DiscoverController extends BaseController
{
    /**
     * Affiche la page "Découvrir"
     */
    public function index($request)
    {
        $type_active = (isset($request['id'])) ? $request['id'] : 1;

        $types = $this->db->getTypes();
        $lieux = $this->db->getLieuxByType($type_active);
        $detail_type = $this->db->getType($type_active);

        return $this->render('discover.html.twig', compact('lieux','types', 'detail_type', 'type_active'));
    }

    /**
     * Recupère les images de la galerie
     *
     * @return void
     */
    public function gallery()
    {
        $images = $this->db->getPhotos();

        echo $this->render('gallery.html.twig', compact('images'));
    }

    /**
     * Altération des photos (renommage, redimensionnement à la volée)
     *
     * @return void
     */
    private function refactorImages()
    {
        $dir = __DIR__.'/../../../public/img/photos';
        $adapter = new Local($dir);
        $fileSystem = new Filesystem($adapter);

        $files = $fileSystem->listContents('/', true);
        $slugify = new Slugify();
        $manager = new ImageManager(array('driver' => 'gd'));
        
        $images = [];
        $extensions = ['jpg', 'png', 'gif'];

        foreach($files as $file)
        {
            if(array_key_exists('extension', $file) && in_array($file['extension'], $extensions) && $file['basename'] != 'logo.png')
            {
                $slug = $slugify->slugify(ucwords($file['filename']), [
                    'separator' => '_',
                    'lowercase' => false
                ]);
                $size = $fileSystem->getSize($file['basename']);
                
                $filePath = $slug.'.'.$file['extension'];
                
                if($file['basename'] != $filePath && !$fileSystem->has($filePath)) {
                    if($fileSystem->rename($file['basename'], $filePath)) {
                        $fileSystem->delete($file['basename']);
                    }
                }
                
                if($size >= 4000000) {
                    $img = $manager->make($dir.'/'.$file['basename'])->encode('jpg', 75);
                    $img->save($dir.'/'.$filePath);
                }
                
                $images[] = $filePath;

                $description = str_replace('_', ' ', $file['filename']);
                if($this->db->addPhoto($filePath, $description, $size))
                {
                    $images[] = $filePath;
                }
            } 
        }
    }
}
