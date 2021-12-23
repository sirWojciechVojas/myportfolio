<?php

namespace App\Controller\Admin;

use App\Form\EditUserType;
use App\Service\UserEditService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

#[Route('/admin')]
class ProfilController extends AbstractController
{
    public function __construct(private Security $security, private UserEditService $userService)
    {}

    #[Route('/profil', name: 'profil')]
    public function profil(Request $request): Response
    {
        $form = $this->createForm(EditUserType::class, $this->security->getUser());

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->userService->edit($form->getData());
            $this->addFlash('success', 'Le profil à bien été modifié.');
            return $this->redirectToRoute('dashboard');
        }

        return $this->render('@admin/profil/profil.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
