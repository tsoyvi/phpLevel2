<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// 
use App\Entity\SymProduct;
use Symfony\Component\HttpFoundation\Request;
//

class ProductViewController extends AbstractController
{
    /**
     * @Route("/product/view", name="product_view")
     */
    public function index(): Response
    {
        $request = Request::createFromGlobals();

        $productRepository = $this->getDoctrine()->getRepository(SymProduct::class);
        $product = $productRepository->find($request->query->get('id'));

        return $this->render('product_view/index.html.twig', [
            'controller_name' => 'ProductViewController',
            'product' => $product,
            'request' => $request->query->get('id'),
        ]);
    }
}
