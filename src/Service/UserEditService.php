<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserEditService
{
    public function __construct(
        private EntityManagerInterface $manager,
        private UserPasswordHasherInterface $passwordHasher
    )
    {}
    
    /**
     * edit
     * Modifie les informations d'un utilisateurs
     *
     * @param  User $user
     * @return void
     */
    public function edit(User $user): void
    {
        if ($user->getPlainPassword() !== null) {
            $hashedPassword = $this->passwordHasher->hashPassword(
                $user,
                $user->getPlainPassword()
            );

            $user->setPassword($hashedPassword);
        }
        $this->manager->flush();
    }
}