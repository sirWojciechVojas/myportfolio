<?php

/**
 * Méthode pour la'jout, la modification et la suppression d'une compétence
 */

namespace App\Interface;

use App\Entity\Skill;

interface SkillCUDInterface
{    
    /**
     * delete
     *
     * @param  Skill $skill
     * @return void
     */
    public function delete(Skill $skill): void;
    
    /**
     * persist
     *
     * @param  Skill $skill
     * @return void
     */
    public function persist(Skill $skill): void;
}