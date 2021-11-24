<?php

namespace App\Controller;
//
use App\Entity\SymProduct;
//

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class ProductsController extends AbstractController
{
    /**
     * @Route("/products", name="products")
     */
    public function index(): Response
    {
        $productRepository = $this->getDoctrine()->getRepository(SymProduct::class);
        $products = $productRepository->findAll();
        //var_dump($products);

        
        return $this->render('products/index.html.twig', [
            'controller_name' => 'ProductsController',
            'allProducts' => $products,
        ]);
    }
}
