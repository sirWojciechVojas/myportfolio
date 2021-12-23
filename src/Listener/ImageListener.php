<?php

namespace App\Listener;

use App\Entity\Image;
use App\Service\ImageDeleteService;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class ImageListener
{
    public function __construct(private ImageDeleteService $imageService)
    {}
    
    /**
     * preUpdate
     * Supprime une image contenue dans le fichier targetDirectory lors de sa modification
     *
     * @param  Image $image
     * @param  LifecycleEventArgs $event
     * @return void
     */
    public function preUpdate(Image $image, LifecycleEventArgs $event): void
    {
        $this->imageService->deleteImageInDirectory($event->getOldValue('path'));
    }
    
    /**
     * preRemove
     * Supprime une image contenue dans le fichier targetDirectory lors de sa suppression
     * 
     * @param  Image $image
     * @param  LifecycleEventArgs $event
     * @return void
     */
    public function preRemove(Image $image, LifecycleEventArgs $event): void
    {
        $this->imageService->deleteImageInDirectory($image->getPath());
    }
}