<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

use App\Service\Master;

class LearningController extends AbstractController
{
    public function __construct(Master $service) {
        $this->service = $service;
    }

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

    #[Route('/change', name: 'change')]
    public function changeMyName(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $session = $request->getSession();
            $name = $request->get('user_name');
            
            // $name = $this->service->capitalize($name);

            // $name = $this->service->dashes($name);

            $session->set('user_name', $name);
        }

        return $this->redirect('home');
    }

    #[Route('/about-becode', name: 'about-me')]
    public function aboutMe(Request $request): Response
    {
        $session = $request->getSession();
        $session_name = $session->get('user_name');

        if ($session_name) {
            $name = $session_name;

            return $this->render('learning/about-me.html.twig', [
                'controller_name' => 'LearningController',
                'name' => $name
            ]);

        } else {
            return $this->forward('App\Controller\LearningController::showMyName', []);
        }
    }
}
