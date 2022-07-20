<?php

// src/Controller/RecipeController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RecipeRepository;

class RecipeController extends AbstractController
{
    #[Route('/', name: 'recipe_index')]
    public function recipeIndex(RecipeRepository $recipeRepository): Response
    {
        $recipes = $recipeRepository->findAll();

        return $this->render('recipe/index.html.twig', [
            'recipes' => $recipes,
            //'website' => 'Asian Taste',
         ]);
    }
}
