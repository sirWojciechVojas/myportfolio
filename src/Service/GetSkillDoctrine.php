<?php

/**
 * Permet de récupérer la liste des compétences avec Doctrine
 */

namespace App\Service;

use App\Entity\Skill;
use App\Interface\GetSkillInterface;
use App\Repository\SkillRepository;

class GetSkillDoctrine implements GetSkillInterface
{
    public function __construct(private SkillRepository $repository)
    {}
    
    /**
     * getList
     * Récupère la liste des compétences
     *
     * @return array
     */
    public function getList(): array
    {
        return $this->repository->findAll();
    }

    /**
     * count
     * Nombre de compétences
     *
     * @return int
     */
    public function count(): int
    {
        return $this->repository->count([]);
    }
    
    /**
     * lastEntityPersist
     * Retourne la dernière compétence ajouté
     *
     * @return Skill
     */
    public function lastEntityPersist(): Skill
    {
        return $this->repository->findLastInserted();
    }
}