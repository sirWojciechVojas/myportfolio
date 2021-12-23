<?php

/**
 * Permet de récupérer la liste des projets avec Doctrine
 */

namespace App\Service;

use App\Entity\Project;
use App\Interface\GetProjectInterface;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;

class GetProjectDoctrine implements GetProjectInterface
{
    public function __construct(private ProjectRepository $repository, private EntityManagerInterface $manager)
    {}
    
    /**
     * getList
     * Récupère la liste des projets
     *
     * @return array
     */
    public function getList(): array
    {
        return $this->repository->findAll();
    }
    
    /**
     * count
     * Nombre de projets
     *
     * @return int
     */
    public function count(): int
    {
        return $this->repository->count([]);
    }
    
    /**
     * lastEntityPersist
     * Retourne le dernier projet ajouté
     *
     * @return Project
     */
    public function lastEntityPersist(): Project
    {
        return $this->repository->findLastInserted();
    }
}