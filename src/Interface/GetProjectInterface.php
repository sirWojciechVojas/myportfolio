<?php

namespace App\Interface;

use App\Entity\Project;

interface GetProjectInterface
{
    /**
     * getList
     *
     * @return Project[]
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
     * @return Project
     */
    public function lastEntityPersist(): Project;
}

