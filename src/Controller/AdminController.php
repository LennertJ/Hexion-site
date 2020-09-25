<?php

namespace App\Controller;

use App\Entity\Functies;
use App\Entity\User;
use App\Form\EditUserRoleType;
use App\Form\FunctieEditType;
use App\Form\FunctieType;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
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
    public function showAllFuncties()
    {
        $functies = $this->getDoctrine()
            ->getRepository(Functies::class)
            ->findAll();

        return $this->render('functies/showAll.html.twig',[
            'functies' => $functies
        ]);
    }

    /**
     * @Route("/admin/users/showAll", name="showUsers")
     */
    public function showAllUsers()
    {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        return $this->render('users/showAll.html.twig',[
            'users' => $users
        ]);
    }

    /**
     * @Route("/admin/users/delete{id}", name="DeleteUser")
     * @param Request $request
     * @return Response
     */
    public function deleteUser(Request $request, $id):Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class)->find($id);
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->redirectToRoute('showUsers');
    }

    /**
     * @Route("/admin/user/edit{id}", name="EditUserRoles")
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function editUserRoles(Request $request,int $id):Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(user::class)->find($id);

        if (!$user) {
            throw $this->createNotFoundException(
                'unexpected internal error '
            );
        }

        $form = $this->createForm(EditUserRoleType::class,$user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setRoles($form['roles']->getData());

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('showUsers');
        }

        return $this->render('users/EditRole.html.twig', [
            'EditUserRoleForm' => $form->createView(),
        ]);
    }
}
