<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Recipe;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RecipeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i = 1; $i < 101; $i++) 
        {
        $recipe = new Recipe();

        $recipe->setName($faker->randomElement([
            'Nouilles au boeuf taïwanaises',
            'Nems au porc',
            'Chirashi',
            'Bo bun',
            'Poulet paneer',
            'Jiaozi au poulet',
            'Pad thaï aux crevettes',
        ]));
        $recipe->setNbPeople($faker->randomElement([
            2, 4, 6, 8, 10
        ]));
        $recipe->setPrepTime($faker->randomElement([
            20, 25, 30, 45, 60, 120, 180
        ]));
        $recipe->setCookingTime($faker->randomElement([
            10, 15, 30, 50, 60, 90, 120
        ]));
        $recipe->setIngredient($faker->randomElement([
            '1 carotte, 3 oignons, 2 cs de sauce nuoc-mâm, 100 g de riz',
            '200 g poulet, 1 cs de sauce soja, 150 g de nouilles de riz, 2 bok choy',
            '300 g de crevettes, 1 oignon, 100 g de nouilles de blé, 1/4 chou chinois',
            '100 g de riz, 300 g de boeuf à mijoter, 2 cs de sauce soja épaisse, 1 cs de sauce à l\'ail et au piment',
            '100 g de farine, 6 shitakes, 3 champignons noirs, 2 oeufs, 150 g de viande de porc',
            '250 g de crevettes, 1 cc de sauce soja, 100 g de nouilles de riz, 2 tomates, 2 carottes',
            '1 navet, de la sauce soja épaisse, 150 g de tofu, 1/2 chou chinois, 100 g de riz',
        ]));
        $recipe->setStep($faker->paragraphs(6, true));
        $recipe->setPicture($faker->randomElement([
            'beef-noodle-soup.jpg',
            'butajiru.jpg',
            'butter-chicken',
            'cock-a-leekie.jpg',
            'duck-soup-noodles.jpg',
            'fish.jpg',
            'hara-masala-murgh.jpg',
            'kimchi.guk.jpg',
            'miso-soup.jpg',
            'pork-blood-soup.jpg',
            'solyanka.jpg',
            'soto.jpg',
        ]));

        $manager->persist($recipe);

        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return
            [
                CuisineFixtures::class
            ];
    }
}
