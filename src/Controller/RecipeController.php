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
            'website' => 'Asian Taste',
         ]);
    }
}

/*

#[Route('/', name: 'index')]
    public function index(
        Request $request,
        CakeSearchService $cakeSearchService,
        DepartmentRepository $departmentRepository
    ): Response {
        // fetching all departments for the scrolling menu
        $departmentsDisplay = $departmentRepository->findAll();
        // creating form
        $searchForm = $this->createForm(SearchCakeFormType::class);
        $searchForm->handleRequest($request);
        // initializing search and department variables before the form is set
        $search = "";
        $department = "";

        if ($searchForm->isSubmitted() && $searchForm->isValid()) {
            $searchRequest = $request->get('search_cake_form');

            // some bricolage to please phpcs
            if (is_array($searchRequest)) {
                $search = $searchRequest['search'];

                // for homepage buttons (which don't take departments into account)
                if (isset($searchRequest['department'])) {
                    $department = $searchRequest['department'];
                }
            }
        }
        // calling the CakeSearchService

        $cakes = $cakeSearchService->cakeSearch($search, $department);

        return $this->renderForm('cake/index.html.twig', [
            'cakes' => $cakes,
            'searchForm' => $searchForm,
            'search' => $search,
            'departments' => $departmentsDisplay,
        ]);
    }
    */