<?php

namespace App\Service;

class ImageDeleteService
{
    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }
    
    /**
     * deleteImageInDirectory
     * Supprime une image contenue dans le fichier targetDirectory pour la modification et la suppression d'un projet
     *
     * @param  string $path
     * @return void
     */
    public function deleteImageInDirectory(string $path): void
    {
        $image = $this->targetDirectory . '/' . $path;
        if ($image) {
            unlink($image);
        }
    }
}