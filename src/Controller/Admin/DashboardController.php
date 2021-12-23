<?php

namespace App\Controller\Admin;

use App\Interface\GetProjectInterface;
use App\Interface\GetSkillInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    public function __construct(
        private GetProjectInterface $projectService,
        private GetSkillInterface $skillService
    )
    {}

    #[Route('/admin', name: 'dashboard')]
    public function index(): Response
    {
        return $this->render('@admin/dashboard/index.html.twig', [
            'numberProject'     => $this->projectService->count(),
            'lastProject'       => $this->projectService->lastEntityPersist(),
            'numberSkill'       => $this->skillService->count(),
            'lastSkill'         => $this->skillService->lastEntityPersist()
        ]);
    }
}
