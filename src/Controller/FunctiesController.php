<?php

namespace App\Controller;

use App\Entity\Functies;
use App\Form\FunctieType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;


class FunctiesController extends AbstractController
{
    /**
     * @Route("/admin/functie/add", name="addfunctie")
     * @param Request $request
     * @return Response
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

            return $this->redirectToRoute('showfuncties');
        }

        return $this->render('functies/add.html.twig', [
            'FunctieForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/functie/showAll", name="showfuncties")
     */
    public function showAll()
    {
        $functies = $this->getDoctrine()
            ->getRepository(Functies::class)
            ->findAll();

        return $this->render('functies/showAll.html.twig',[
            'functies' => $functies
        ]);
    }
}
