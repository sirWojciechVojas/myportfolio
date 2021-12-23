<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Form\AddProjectType;
use App\Interface\ProjectCUDInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin')]
class ProjectCUDController extends AbstractController
{
    public function __construct(private ProjectCUDInterface $projectService)
    {}
    
    /**
     * addProject
     * Ajoute un projet
     *
     * @param  Request $request
     * @return Response
     */
    #[Route('/project/add', name: 'admin.add.project')]
    public function addProject(Request $request): Response
    {
        $project = new Project;
        $form = $this->createForm(AddProjectType::class, $project);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->projectService->persist($form->getData());
            $this->addFlash('success', 'Le projet à bien été ajouté.');
            return $this->redirectToRoute('admin.list.project');
        }

        return $this->render('@admin/project/gestion-project.html.twig', [
            'pageName'  => 'Ajouter',
            'form'      => $form->createView()
        ]);
    }

    #[Route('/project/edit/{id}', name: 'admin.edit.project', requirements: ['id' => '\d+'])]
    public function editProject(Request $request, Project $project): Response
    {
        $form = $this->createForm(AddProjectType::class, $project);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->projectService->persist($form->getData());
            $this->addFlash('success', 'Le projet à bien été modifié.');
            return $this->redirectToRoute('admin.list.project');
        }

        return $this->render('@admin/project/gestion-project.html.twig', [
            'pageName' => 'Modifier',
            'form'      => $form->createView()
        ]);
    }
    
    /**
     * deleteProject
     * Supprime un projet
     *
     * @param  Project $project
     * @return Response
     */
    #[Route('/project/delete/{id}', name: 'admin.delete.project', requirements:['id' => '\d+'])]
    public function deleteProject(Project $project): Response
    {
        $this->projectService->delete($project);
        $this->addFlash('success', 'Le projet à bien été supprimé.');
        return $this->redirectToRoute('admin.list.project');
    }
}
