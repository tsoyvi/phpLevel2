<?php

namespace App\Controller;

use App\Entity\SymProduct;
use App\Form\AddProductFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//
use Symfony\Component\Routing\Annotation\Route;

//

class AddProductController extends AbstractController
{
    /**
     * @Route("/", name="add_product")
     *
     */
    public function index(): Response
    {

        $request = Request::createFromGlobals();
        echo 'request - ' . $request->request->get('title');

        //dump ($request->request->keys());
        //exit;

        $this->new($request);

// создает объект задачи и инициализирует некоторые данные для этого примера
        $task = new SymProduct();
        $task->setTitle('Write a blog post');
        $task->setDescription('Write a Description');
        $task->setPrice(100);

        $form = $this->createForm(AddProductFormType::class, $task);

        return $this->render('add_product/index.html.twig', [
            'controller_name' => 'AddProductController',
            'form' => $form->createView(),
        ]);
    }

    function new (Request $request): Response {

        $task = new SymProduct();

        $form = $this->createForm(AddProductFormType::class, $task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // но изначальная переменная `$task` также была обновлена
            // $task = $form->getData();
                echo'test ok';
            // ... выполните какое-то действие, например сохраните задачу в базу данных
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            return $this->redirectToRoute('products');
        }

        return $this->render('add_product/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
