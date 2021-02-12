<?php

namespace App\Controller;

use App\Entity\Categories;
use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    /*ici j'essaye d'attraper toutes mes categories qui sont en db*/

    /**
     * @Route("/categories", name="categories")
     */
    public function index(): Response
    {
        $categories = $this->getDoctrine()
            ->getRepository(Categories::class)
            ->findAll();

        return $this->render('categories/categories.html.twig', [
            'controller_name' => 'CategoriesController',
            'categories' => $categories

        ]);
    }
}
