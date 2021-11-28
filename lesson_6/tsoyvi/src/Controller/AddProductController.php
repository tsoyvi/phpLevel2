<?php

namespace App\Controller;

use App\Entity\SymProduct;
use App\Form\AddProductFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
// use Symfony\Component\HttpFoundation\File\UploadedFile;
//

class AddProductController extends AbstractController
{
    /**
     * @Route("/add/product", name="add_product")
     *
     */

    public function index(Request $request, string $photoDir): Response
    {

        $task = new SymProduct();

        $form = $this->createForm(AddProductFormType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if ($image = $form->get('image')->getData()) {

                $filename = bin2hex(random_bytes(6))  . '.' . $image->guessExtension();

                try {
                    $image->move($photoDir, $filename);
                } catch (FileException $e) {
                    // unable to upload the photo, give up
                }
                $task->setImage($filename);
            }


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('products');
        }

        return $this->render('add_product/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
