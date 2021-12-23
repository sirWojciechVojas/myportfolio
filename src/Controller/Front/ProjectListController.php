<?php

namespace App\Controller\Front;

use App\Interface\GetProjectInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ProjectListController extends AbstractController
{
    public function getListProject(GetProjectInterface $getSkillService): Response
    {
        return $this->render('front/section/project/_project.html.twig', [
            'projects' => $getSkillService->getList()
        ]);
    }
}
