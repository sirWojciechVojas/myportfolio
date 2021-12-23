<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ImageFixtures extends Fixture
{
    public const IMAGE_USER_REFERENCE = 'image_';

    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i < 10; $i++) {
            $image = new Image;
            $image
                ->setPath('https://picsum.photos/seed/picsum/600/480')
                ->setAlt($faker->sentence(5))
            ;
            $manager->persist($image);
            $this->addReference(self::IMAGE_USER_REFERENCE . $i, $image);
        }

        $manager->flush();
    }
}
