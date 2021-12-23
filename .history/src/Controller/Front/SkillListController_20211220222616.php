<?php

namespace App\Controller\Front;

use App\Interface\GetSkillInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class SkillListController extends AbstractController
{    
    /**
     * getListSkill
     * Récupère la liste des compétences
     *
     * @param  GetSkillInterface $getSkillService
     * @return Response
     */
    public function getListSkill(GetSkillInterface $getSkillService): Response
    {
        return $this->render('front/section/skill/_skill.html.twig', [
            'skills' => $getSkillService->getList()
        ]);
    }
}
