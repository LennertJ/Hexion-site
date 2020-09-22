<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/mijnProfiel", name="profile")
     */
    public function index()
    {
        return $this->render('profile/index.html.twig');
    }
}