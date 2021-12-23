<?php

namespace App\Interface;

use App\Entity\Skill;

interface GetSkillInterface
{    
    /**
     * getList
     *
     * @return array
     */
    public function getList(): array;

    /**
     * count
     *
     * @return int
     */
    public function count(): int;
    
    /**
     * lastEntityPersist
     *
     * @return Skill
     */
    public function lastEntityPersist(): Skill;
}
