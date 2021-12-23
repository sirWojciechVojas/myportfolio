<?php

/**
 * Controller pour l'ajout, la modification et la suppression d'une compétence
 */

namespace App\Controller\Admin;

use App\Entity\Skill;
use App\Form\SkillType;
use App\Interface\SkillCUDInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

#[Route('/admin')]
class SkillCUDController extends AbstractController
{
    public function __construct(private SkillCUDInterface $skillService)
    {}

    #[Route('/skill/add', name: 'admin.add.skill')]    
    /**
     * addSkill
     * Ajoute une nouvelle compétnce
     *
     * @param  Request $request
     * @return Response
     */
    public function addSkill(Request $request): Response
    {
        $skill = new Skill;
        $form = $this->createForm(SkillType::class, $skill);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->skillService->persist($form->getData());
            $this->addFlash('success', 'La compétence à bien été ajoutée.');
            return $this->redirectToRoute('admin.list.skill');
        }

        return $this->render('@admin/skill/gestion-skill.html.twig', [
            'pageName'  => 'Ajouter',
            'form'      => $form->createView()
        ]);
    }

    /**
     * editSkill
     * Modifie une compétence
     *
     * @param  Request $request
     * @param  Skill $skill
     * @return Response
     */
    #[Route('/skill/edit/{id}', name: 'admin.edit.skill', requirements:['id' => '\d+'])] 
    public function editSkill(Request $request, Skill $skill): Response
    {
        $form = $this->createForm(SkillType::class, $skill);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->skillService->persist($form->getData());
            $this->addFlash('success', 'La compétence à bien été modifiée.');
            return $this->redirectToRoute('admin.list.skill');
        }

        return $this->render('@admin/skill/gestion-skill.html.twig', [
            'pageName' => 'Modifier',
            'form'      => $form->createView()
        ]);
    }

    /**
     * deleteSkill
     * Supprime une compétence et redirige vers la page qui liste les compétnces
     *
     * @param  Skill $skill
     * @return Response
     */
    #[Route('/skill/delete/{id}', name: 'admin.delete.skill', requirements:['id' => '\d+'])] 
    public function deleteSkill(Skill $skill): Response
    {
        $this->skillService->delete($skill);
        $this->addFlash('success', 'La compétence à bien été supprimée.');
        return $this->redirectToRoute('admin.list.skill');
    }
}
