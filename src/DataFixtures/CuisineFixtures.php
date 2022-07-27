<?php

namespace App\DataFixtures;

use App\Entity\Cuisine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CuisineFixtures extends Fixture
{
    const CUISINES = [
        'Japanese',
        'Chinese',
        'Vietnamese',
        'Indian',
        'Korean',
        'Thailandese',
        'Indonesian',
        'Taiwanese',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach(self::CUISINES as $cuisineName)
        {
            $cuisine = new Cuisine();
            $cuisine->setName($cuisineName);
            $manager->persist($cuisine);
            $this->addReference('cuisine_' . $cuisineName, $cuisine);
        }

        $manager->flush();
    }
}
