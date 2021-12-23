<?php

namespace App\Controller\Admin;

use App\Entity\Skill;
use App\Interface\GetSkillInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin')]
class SkillController extends AbstractController
{
    #[Route('/skills', name: 'admin.list.skill')]
    public function listSkills(GetSkillInterface $getSkillService, PaginatorInterface $paginator, Request $request): Response
    {
        $pagination = $paginator->paginate(
            $getSkillService->getList(),
            $request->query->getInt('page', 1),
            Skill::NUMBER
        );

        return $this->render('@admin/skill/list-skill.html.twig', [
            'skills'        => $pagination,
            'numberPage'    => $request->query->getInt('page', 1) - 1
        ]);
    }
}
