<?php

// src/Controller/RecipeController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipeController extends AbstractController
{
    #[Route('/', name: 'recipe_index')]
    public function index(): Response
    {
        return $this->render('recipe/index.html.twig', [
            'website' => 'Asian Taste',
         ]);
    }
}