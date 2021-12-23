<?php

// src/Service/FileUploader.php
namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\String\Slugger\SluggerInterface;

class FileUploader
{
    private $targetDirectory;
    private $slugger;

    public function __construct($targetDirectory, SluggerInterface $slugger, RequestStack $request)
    {
        $this->targetDirectory = $targetDirectory;
        $this->slugger = $slugger;
        $this->request = $request;
    }
    
    /**
     * upload
     *
     * @param  UploadedFile $file
     * @return string
     */
    public function upload(UploadedFile $file): string
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        try {
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileException $e) {
            $this->request->getCurrentRequest()->getSession()->getFlashBag()->add('danger', "L'image n'a pas pu être téléchargée.");
        }

        return $fileName;
    }
    
    /**
     * getTargetDirectory
     *
     * @return string
     */
    public function getTargetDirectory(): string
    {
        return $this->targetDirectory;
    }
}
