<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\User;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void

    {

        // Création d’un utilisateur de type “contributeur” (= auteur) n°1

        $contributor = new User();
        $faker = Factory::create('fr_FR');

        $contributor->setEmail('user1@test.com');

        $contributor->setRoles(['ROLE_CONTRIBUTOR']);

        $hashedPassword = $this->passwordHasher->hashPassword(

            $contributor,

            'password'

        );

        $contributor->setPassword($hashedPassword);

        $manager->persist($contributor);

        //$this->addReference('user_1', $contributor);




        // Création d’un utilisateur de type “administrateur”

        $admin = new User();

        $admin->setEmail('admin@asiantaste.com');

        $admin->setRoles(['ROLE_ADMIN']);

        $hashedPassword = $this->passwordHasher->hashPassword(

            $admin,

            'password'

        );

        $admin->setPassword($hashedPassword);

        $manager->persist($admin);

        

        // Sauvegarde des 2 nouveaux utilisateurs :

        $manager->flush();
    }

    private UserPasswordHasherInterface $passwordHasher;


    public function __construct(UserPasswordHasherInterface $passwordHasher)

    {

        $this->passwordHasher = $passwordHasher;
    }
}
