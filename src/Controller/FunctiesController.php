<?php

namespace App\Controller;

use App\Entity\Functies;
use App\Form\FunctieType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FunctiesController extends AbstractController
{
    /**
     * @Route("/admin/functie/add", name="addfunctie")
     */
    public function addfunctie(Request $request):Response
    {
        $functie = new Functies();
        $form = $this->createForm(FunctieType::class, $functie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $functie = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($functie);
            $entityManager->flush();

            return $this->redirectToRoute('main');
        }

        return $this->render('functies/add.html.twig', [
            'FunctieForm' => $form->createView(),
        ]);
    }
}
