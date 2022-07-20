<?php

// src/Controller/RecipeController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RecipeRepository;
use App\Entity\Recipe;

#[Route('/', name: 'recipe_')]
class RecipeController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function recipeIndex(RecipeRepository $recipeRepository): Response
    {
        $recipes = $recipeRepository->findAll();

        return $this->render('recipe/index.html.twig', [
            'recipes' => $recipes,
            //'website' => 'Asian Taste',
         ]);
    }

    #[Route('/{id}', name: 'show')]
    public function show(Recipe $recipe): Response
    {
        //$season = $seasonRepository->findAll();

        return $this->render('recipe/show.html.twig', [
            'recipe' => $recipe
        ]);
    }
}
