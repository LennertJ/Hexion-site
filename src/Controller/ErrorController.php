<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    /**
     * @Route("/error", name="error")
     */
    public function index()
    {
        return $this->render('error/index.html.twig', [
            'controller_name' => 'ErrorController',
        ]);
    }


    public function show()
    {
        return $this->render('bundles/TwigBundle/Exception/error404.html.twig');
    }
}
