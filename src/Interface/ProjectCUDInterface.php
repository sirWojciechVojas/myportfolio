<?php

/**
 * Méthode pour la'jout, la modification et la suppression d'un projet
 */

namespace App\Interface;

use App\Entity\Project;

interface ProjectCUDInterface
{    
    /**
     * delete
     *
     * @param  Project $project
     * @return void
     */
    public function delete(Project $project): void;
    
    /**
     * persist
     *
     * @param  Project $project
     * @return void
     */
    public function persist(Project $project): void;
    
}