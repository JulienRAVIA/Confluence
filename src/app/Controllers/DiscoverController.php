<?php

namespace App\Controllers;

use Cocur\Slugify\Slugify;
use League\Flysystem\Filesystem;
use League\Flysystem\Adapter\Local;

/**
 * DiscoverController
 */
class DiscoverController extends BaseController
{
    /**
     * Affiche la page "Découvrir"
     */
    public function index()
    {
        $types = $this->db->getTypes();
        $lieux = $this->db->getLieuxOnly();

        return $this->render('decouvrir.html.twig', compact('lieux','types'));
    }

    public function gallery()
    {
        $adapter = new Local(__DIR__.'/../../../public/img/photos');
        $filesystem = new Filesystem($adapter);
        $files = $filesystem->listContents('/', true);
        $slugify = new Slugify();
        
        $images = [];
        $extensions = ['jpg', 'png', 'gif'];

        foreach($files as $file)
        {
            if(array_key_exists('extension', $file) && in_array($file['extension'], $extensions))
            {
                $images[] = $file['basename'];
                // $slug = $slugify->slugify(ucwords($file['filename']), [
                //     'separator' => '_',
                //     'lowercase' => false
                // ]);
                // $filePath = $slug.'.'.$file['extension'];
                // $images[] = $filePath;
                
                // if($file['basename'] != $filePath && !$filesystem->has($filePath)) {
                //     if($filesystem->rename($file['basename'], $filePath)) {
                //         echo 'renamed';
                //     }
                // }
            } 
        }
        shuffle($images);
        echo $this->render('gallery.html.twig', compact('images'));
    }
}
