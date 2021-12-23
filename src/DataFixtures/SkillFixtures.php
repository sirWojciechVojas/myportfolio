<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class SkillFixtures extends Fixture
{
    public const SKILL_USER_REFERENCE = 'skill';

    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i < 50; $i++) {
            $skill = new Skill;
            $skill
                ->setName($faker->unique()->word())
                ->setColor($faker->unique()->hexColor())
                ->setLevel($faker->unique()->numberBetween(0, 100))
            ;
            $manager->persist($skill);
            $this->addReference(self::SKILL_USER_REFERENCE .'_'. $i, $skill);
        }

        $manager->flush();
    }
}
