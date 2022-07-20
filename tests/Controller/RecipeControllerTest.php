<?php

namespace App\Test\Controller;

use App\Entity\Recipe;
use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RecipeControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private RecipeRepository $repository;
    private string $path = '/recipe/crud/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(Recipe::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Recipe index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'recipe[name]' => 'Testing',
            'recipe[nbPeople]' => 'Testing',
            'recipe[prepTime]' => 'Testing',
            'recipe[cookingTime]' => 'Testing',
            'recipe[ingredient]' => 'Testing',
            'recipe[step]' => 'Testing',
            'recipe[picture]' => 'Testing',
            'recipe[cuisine]' => 'Testing',
        ]);

        self::assertResponseRedirects('/recipe/crud/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Recipe();
        $fixture->setName('My Title');
        $fixture->setNbPeople('My Title');
        $fixture->setPrepTime('My Title');
        $fixture->setCookingTime('My Title');
        $fixture->setIngredient('My Title');
        $fixture->setStep('My Title');
        $fixture->setPicture('My Title');
        $fixture->setCuisine('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Recipe');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Recipe();
        $fixture->setName('My Title');
        $fixture->setNbPeople('My Title');
        $fixture->setPrepTime('My Title');
        $fixture->setCookingTime('My Title');
        $fixture->setIngredient('My Title');
        $fixture->setStep('My Title');
        $fixture->setPicture('My Title');
        $fixture->setCuisine('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'recipe[name]' => 'Something New',
            'recipe[nbPeople]' => 'Something New',
            'recipe[prepTime]' => 'Something New',
            'recipe[cookingTime]' => 'Something New',
            'recipe[ingredient]' => 'Something New',
            'recipe[step]' => 'Something New',
            'recipe[picture]' => 'Something New',
            'recipe[cuisine]' => 'Something New',
        ]);

        self::assertResponseRedirects('/recipe/crud/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getName());
        self::assertSame('Something New', $fixture[0]->getNbPeople());
        self::assertSame('Something New', $fixture[0]->getPrepTime());
        self::assertSame('Something New', $fixture[0]->getCookingTime());
        self::assertSame('Something New', $fixture[0]->getIngredient());
        self::assertSame('Something New', $fixture[0]->getStep());
        self::assertSame('Something New', $fixture[0]->getPicture());
        self::assertSame('Something New', $fixture[0]->getCuisine());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Recipe();
        $fixture->setName('My Title');
        $fixture->setNbPeople('My Title');
        $fixture->setPrepTime('My Title');
        $fixture->setCookingTime('My Title');
        $fixture->setIngredient('My Title');
        $fixture->setStep('My Title');
        $fixture->setPicture('My Title');
        $fixture->setCuisine('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/recipe/crud/');
    }
}
