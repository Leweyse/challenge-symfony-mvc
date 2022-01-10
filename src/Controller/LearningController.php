<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
    #[Route('/learning', name: 'learning')]
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }

    #[Route('/home', name: 'homepage')]
    public function showMyName(Request $request): Response
    {
        $session = $request->getSession();
        $session_name = $session->get('user_name');

        if ($session_name) {
            $name = $session_name;
        } else {
            $name = "Unknown";
        }

        return $this->render('learning/home.html.twig', [
            'controller_name' => 'LearningController',
            'name' => $name
        ]);
    }
}
