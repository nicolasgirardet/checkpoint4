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
        $faker = Factory::create('en_US');
        for ($i = 1; $i < 101; $i++) {
            $recipe = new Recipe();

            $recipe->setName($faker->randomElement([
                'Taiwanese Beef Noodles',
                'Fried Pork Spring Rolls',
                'Chirashi',
                'Bo bun',
                'Palak Chicken',
                'Chicken Jiaozi',
                'Shrimp Pad Thai',
                'Phô Soup'
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
                "3 chicken breasts boneless,
                4 cups chopped spinach,
                ¼ cup cooking oil,
                1 medium onion sliced,
                2 tablespoon ginger-garlic paste,
                1 medium tomato chopped,
                12 cashews pureed,
                1 teaspoon cumin seeds,
                1 black cardamom,
                4 cloves,
                1 teaspoon red chilli powder,
                1 teaspoon coriander powder,
                ½ teaspoon turmeric powder optional,
                salt to taste",
                "Ingredients (to mix in with the sushi rice):

                Dried shiitake mushrooms
                Carrots
                Gobo (burdock root) — can also be found at Whole Foods or local co-ops.
                Dried kanpyo (gourd strips)
                Bamboo shoot (blanched)
                Inari age (seasoned deep-fried tofu pouch)
                Kamaboko and chikuwa (fish cakes)
                Koyadofu (seasoned dehydrated tofu)
            
            Toppings:
            
                Avocado (sliced or cubed)
                Snow peas
                Green beans (blanched)
                Egg crepe
                Shrimp
                Crab (real or imitation)
                Kinome (木の芽 (山椒)) – I look for it locally but no luck…
                Octopus (boiled)
                Sakura denbu (seasoned ground codfish) – pink color adds a nice touch for Girl’s Day celebration!
                Tobiko (flying fish roe)
            ",
                "3 pounds beef shank (1.4 kg, cut into 2-inch chunks),
                2 tablespoons oil,
                A 2-inch piece of ginger (smashed),
                6 cloves garlic (smashed),
                3 scallions (cut into 2-inch segments),
                1 onion (cut into wedges),
                1 tomato (cut into wedges),
                4 dried chilies (ripped in half),
                1 tablespoon tomato paste,
                2 tablespoons spicy bean paste douban jiang,
                2 teaspoons sugar,
                1/2 cup soy sauce,
                1/2 cup Shaoxing wine,
                8 cups water (to make the soup broth),
                1 Chinese aromatic herb packet (lu bao––do yourself a favor and hunt down the pre-packaged version; if you can’t access it though, see below for ingredients to create your own spice sachet),
                32 ounces fresh wheat (white) noodles (900g),
                A small handful of bok choy for each serving,
                Cilantro (finely chopped),
                Scallions (finely chopped),
                Pickled mustard greens (to taste, also known as snow vegetable or 雪菜; note this is different from Cantonese haam choy)",
            ]));
            $recipe->setStep($faker->randomElement([


                "Place the noodles in a large heatproof bowl. Fill with enough boiling water to cover the noodles and set aside to soak for 10 to 12 minutes, or until the noodles have softened. Drain and use a fork to separate the strands.Meanwhile, combine the tamarind paste, chili sauce, fish sauce, coconut sugar, chili paste and white pepper in a medium bowl. Set aside. Heat a non-stick skillet or wok over medium-high heat. Swirl 2 teaspoons (10 ml) of oil into the pan and add chicken. Cook for 2 to 3 minutes on both sides, or until slightly browned. Add the garlic, ginger and shallot and stir until fragrant, about 30 seconds. Stir in the carrot and bell pepper and cook until crisp-tender, about 1–2 minutes. Push the vegetables to one side of the pan and add the beaten egg. Allow to cook, while crumbling into small pieces. Add the drained noodles then pour the sauce over the top. Toss with tongs to coat evenly and allow the sauce to simmer and thicken, about 1 minute. Squeeze the juice from 1 lime wedge and taste to adjust seasonings. Remove from heat and serve on a large platter topped with cilantro, mung bean sprouts, roasted peanuts, green onions, sesame seeds and extra lime wedges on the side.",
                "Mix together tamarind paste, fish sauce, and water. Roughly chop palm sugar and slowly melt over medium heat in a small saucepan until a dark blonde color. Once melted, immediately add your premixed sauce and stir until the sugar has dissolved and set aside.
    Prepare your shallot, garlic, tofu, small shrimp, chilis, bean sprouts, and scallions and set aside.
    Over high heat add 1 tbsp of avocado oil and cook your protein and set aside.
    Add 3 tbsp of oil over high heat and add your shallot, garlic, tofu, dried shrimp and optional thai chili peppers. Stir fry for 30 seconds. Next add your rice noodles and sauce and mix to combine. Continue cooking over high heat 2-3 min until the sauce has incorporated into the noodles (test noodles for doneness).
    Push noodles aside and add a bit of oil. Add 2 eggs and scramble until 90% done, then mix together with noodles. Add scallions, bean sprouts and chopped peanuts and mix. Serve with more bean sprouts, chopped peanuts, lime, and chili pepper and enjoy!",
                "Spring rolls can seem intimidating, but you’ll get the hang of it quickly, I promise. If you have folded a burrito before, you can definitely make spring rolls! Don’t stress if your spring rolls aren’t totally perfect. A few tips:
    1) Make the base: Start by placing a few pieces of lettuce about one-third from the bottom of the circular wrapper. The width of your fillings will determine the width of the spring roll. You want to leave a couple inches open on the two sides for wrapping purposes. 2) Pile on the ingredients.Then, add the remaining ingredients. The exact order doesn’t matter much. Just pile them on top, making sure to take up the proper width. It’s ok if the fillings spill upward. I try to leave the top one-third of the wrapper open for wrapping. 3) Roll the filling: Gently pull the bottom of the wrapper up and over the lower portion of the filling. Try to keep the fillings compact as you roll upwards, just until the fillings are enveloped. 4) Envelope the sides and roll it up: Pull each side over to enclose the filling. Continue wrapping upward until your spring roll is fully wrapped!",
            ]));
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
                'Japanese',
                'Chinese',
                'Vietnamese',
                'Indian',
                'Korean',
                'Thailandese',
                'Indonesian',
                'Taiwanese',
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
