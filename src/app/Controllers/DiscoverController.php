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

    public function gallery()
    {
        $dir = __DIR__.'/../../../public/img/photos';
        $adapter = new Local($dir);
        $filesystem = new Filesystem($adapter);

        $files = $filesystem->listContents('/', true);
        $slugify = new Slugify();
        $manager = new ImageManager(array('driver' => 'gd'));
        
        $images = [];
        $extensions = ['jpg', 'png', 'gif'];

        foreach($files as $file)
        {
            if(array_key_exists('extension', $file) && in_array($file['extension'], $extensions))
            {
                $slug = $slugify->slugify(ucwords($file['filename']), [
                    'separator' => '_',
                    'lowercase' => false
                ]);
                $size = $filesystem->getSize($file['basename']);
                
                $filePath = $slug.'.'.$file['extension'];
                if($file['basename'] != $filePath && !$filesystem->has($filePath)) {
                    if($filesystem->rename($file['basename'], $filePath)) {
                        $fileSystem->delete($file['basename']);
                    }
                }
                
                if($size >= 4000000) {
                    $img = $manager->make($dir.'/'.$file['basename'])->encode('jpg', 75);
                    $img->save($dir.'/'.$filePath);
                }
                
                $images[] = $filePath;
            } 
        }
        shuffle($images);
        echo $this->render('gallery.html.twig', compact('images'));
    }
}
