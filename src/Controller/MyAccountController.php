<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SearchRecipeFormType;

class MyAccountController extends AbstractController
{
    #[Route('/myaccount', name: 'app_myaccount_menu')]
    public function menu(): Response
    {
        return $this->render('myaccount/menu.html.twig');
    }

    #[Route('/myaccount/myrecipes', name: 'app_myaccount_myrecipes')]
    public function index(): Response
    {
        return $this->render('myaccount/myrecipes.html.twig');
    }

}