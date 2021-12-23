<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User;

        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            '0000'
        );

        $user
            ->setUsername('jojo')
            ->setRoles(['ROLE_ADMIN'])
            ->setEmail('email@domaine.com')
            ->setPassword($hashedPassword)
        ;

        $manager->persist($user);
        $manager->flush();
        $this->addReference('user', $user);
    }
}
