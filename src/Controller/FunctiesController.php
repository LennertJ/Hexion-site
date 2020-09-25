<?php

namespace App\Controller;

use App\Entity\Functies;
use App\Form\FunctieEditType;
use App\Form\FunctieType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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
     * @Route("/admin/functie/edit{id}", name="editfunctie")
     * @param Request $request
     * @return Response
     */
    public function editfunctie(Request $request,$id):Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $functie = $entityManager->getRepository(Functies::class)->find($id);

        if (!$functie) {
            throw $this->createNotFoundException(
                'unexpected internal error '
            );
        }

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

        return $this->render('functies/edit.html.twig', [
            'FunctieForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/functie/delete{id}", name="deletefunctie")
     * @param Request $request
     * @return Response
     */
    public function deletefunctie(Request $request, $id):Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $functie = $entityManager->getRepository(Functies::class)->find($id);
        $entityManager->remove($functie);
        $entityManager->flush();

        $functies = $this->getDoctrine()
            ->getRepository(Functies::class)
            ->findAll();

        return $this->redirectToRoute('showfuncties');
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
