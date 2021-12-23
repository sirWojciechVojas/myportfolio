<?php

namespace App\Service;

use App\Entity\Skill;
use App\Interface\SkillCUDInterface;
use Doctrine\ORM\EntityManagerInterface;

class SkillCUDDoctrine implements SkillCUDInterface
{
    public function __construct(private EntityManagerInterface $manager)
    {}
    
    /**
     * delete
     *
     * @param  Skill $skill
     * @return void
     */
    public function delete(Skill $skill): void
    {
        $this->manager->remove($skill);
        $this->manager->flush();
    }
    
    /**
     * persist
     *
     * @param  mixed $skill
     * @return void
     */
    public function persist(Skill $skill): void
    {
        $this->manager->persist($skill);
        $this->manager->flush();
    }
}