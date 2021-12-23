<?php

namespace App\Service;

use App\Entity\Project;
use App\Interface\ProjectCUDInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;

class ProjectCUDDoctrine implements ProjectCUDInterface
{
    public function __construct(
        private EntityManagerInterface $manager, 
        private Security $security,
        private FileUploader $fileUploader
    )
    {}
    
    /**
     * delete
     *
     * @param  Project $project
     * @return void
     */
    public function delete(Project $project): void
    {
        $this->manager->remove($project);
        $this->manager->flush();
    }
    
    /**
     * persist
     *
     * @param  Project $project
     * @return void
     */
    public function persist(Project $project): void
    {
        if($project->getFeatured()->getFile() !== null) {
            //Featured
            $path = $this->fileUploader->upload($project->getFeatured()->getFile());
            $image = $project->getFeatured();
            $image->setPath($path);
        }

        //Author
        $project->setAuthor($this->security->getUser());

        $this->manager->persist($project);
        $this->manager->flush();
    }
}