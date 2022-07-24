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
            'Nouilles taïwanaises au boeuf',
            'Nems au porc',
            'Chirashi',
            'Bo bun',
            'Poulet palak',
            'Jiaozi au poulet',
            'Pad thaï aux crevettes',
            'Soupe phô'
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
        $recipe->setPictureOne($faker->randomElement([
            'beef-noodle-soup',
            'butajiru',
            'butter-chicken',
            'cock-a-leekie',
            'duck-soup-noodles',
            'fish',
            'hara-masala-murgh',
            'kimchi-guk',
            'miso-soup',
            'pork-blood-soup',
            'solyanka',
            'soto',
        ]));
        $recipe->setPictureTwo($faker->randomElement([
            'beef-noodle-soup',
            'butajiru',
            'butter-chicken',
            'cock-a-leekie',
            'duck-soup-noodles',
            'fish',
            'hara-masala-murgh',
            'kimchi-guk',
            'miso-soup',
            'pork-blood-soup',
            'solyanka',
            'soto',
        ]));
        $recipe->setPictureThree($faker->randomElement([
            'beef-noodle-soup',
            'butajiru',
            'butter-chicken',
            'cock-a-leekie',
            'duck-soup-noodles',
            'fish',
            'hara-masala-murgh',
            'kimchi-guk',
            'miso-soup',
            'pork-blood-soup',
            'solyanka',
            'soto',
        ]));
        $recipe->setPictureFour($faker->randomElement([
            'beef-noodle-soup',
            'butajiru',
            'butter-chicken',
            'cock-a-leekie',
            'duck-soup-noodles',
            'fish',
            'hara-masala-murgh',
            'kimchi-guk',
            'miso-soup',
            'pork-blood-soup',
            'solyanka',
            'soto',
        ]));
        $recipe->setCuisine($this->getReference('cuisine_' . $faker->randomElement([
        'japonaise',
        'chinoise',
        'vietnamienne',
        'indienne',
        'coréenne',
        'thaïlandaise',
        'indonésienne',
        'taïwanaise',
        ])));
        //$recipe->setUser($this->getReference('user_' . $faker->randomElement('1', '2', '3')));
        $manager->persist($recipe);

        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return
            [
                CuisineFixtures::class, 
                UserFixtures::class
            ];
    }
}
