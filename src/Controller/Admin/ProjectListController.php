<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Interface\GetProjectInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin')]
class ProjectListController extends AbstractController
{
    #[Route('/projects', name: 'admin.list.project')]
    public function listProject(GetProjectInterface $getSkillService, PaginatorInterface $paginator, Request $request): Response
    {
        $projects = $paginator->paginate(
            $getSkillService->getList(),
            $request->query->getInt('page', 1),
            Project::NUMBER
        );

        return $this->render('@admin/project/list-project.html.twig', [
            'projects'      => $projects,
            'numberPage'    => $request->query->getInt('page', 1) - 1
        ]);
    }
}
