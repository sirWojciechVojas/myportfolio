<?php

namespace App\DataFixtures;

use App\Entity\Project;
use App\DataFixtures\UserFixtures;
use App\DataFixtures\ImageFixtures;
use App\DataFixtures\SkillFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROJECT_USER_REFERENCE = 'image_';

    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i < 10; $i++) {
            $project = new Project;
            $project
                ->setName($faker->unique()->sentence(3))
                ->setChapo($faker->paragraph())
                ->setCreatedAt(new \DateTimeImmutable())
                ->setWebsite($faker->unique()->url())
                ->setGithub($faker->unique()->url())
                ->setFeatured($this->getReference('image_' . $i))
                ->setAuthor($this->getReference('user'))
                ->addSkill($this->getReference('skill_' . $i))
                ->addSkill($this->getReference('skill_' . ($i+2)))
            ;
            $manager->persist($project);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            SkillFixtures::class,
            ImageFixtures::class
        ];
    }
}
