<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\RecipeRepository;
use App\Entity\Recipe;
use App\Repository\CuisineRepository;
use App\Form\RecipeType;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SearchRecipeFormType;

class RecipeController extends AbstractController
{
    #[Route('/recipes', name: 'app_recipe_index')]
    public function index(Request $request, RecipeRepository $recipeRepository, CuisineRepository $cuisineRepository): Response
    {
     
  $recipes = $recipeRepository->findAll();

        return $this->render('recipe/index.html.twig', [
            'recipes' => $recipes,
         ]);
    }

    #[Route('/recipes/{search}', name: 'app_recipe_search')]
    public function search(RecipeRepository $recipeRepository, string $search): Response
    {
        $recipes = $recipeRepository->findRecipeByKeyword($search);
        $idsArray = [];
        foreach ($recipes as $recipe) {
            $id = $recipe->getId();
            $idsArray[] = $id;
        }
        $idsArrayJson = json_encode($idsArray);
        return new Response($idsArrayJson);
    }

    #[Route('/recipe/new', name: 'app_recipe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RecipeRepository $recipeRepository): Response
    {
        $recipe = new Recipe();
        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recipeRepository->add($recipe, true);

            return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('recipe/new.html.twig', [
            'recipe' => $recipe,
            'form' => $form,
        ]);
    }

    #[Route('/recipe-details/{id}', name: 'app_recipe_show')]
    public function show(Recipe $recipe): Response
    {
        return $this->render('recipe/show.html.twig', [
            'recipe' => $recipe
        ]);
    }

    #[Route('/recipe/{id}/edit', name: 'app_recipe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Recipe $recipe, RecipeRepository $recipeRepository): Response
    {
        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recipeRepository->add($recipe, true);

            return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('recipe/edit.html.twig', [
            'recipe' => $recipe,
            'form' => $form,
        ]);
    }

    #[Route('/recipe/{id}', name: 'app_recipe_delete', methods: ['POST'])]
    public function delete(Request $request, Recipe $recipe, RecipeRepository $recipeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recipe->getId(), $request->request->get('_token'))) {
            $recipeRepository->remove($recipe, true);
        }

        return $this->redirectToRoute('app_recipe_index', [], Response::HTTP_SEE_OTHER);
    }
}
