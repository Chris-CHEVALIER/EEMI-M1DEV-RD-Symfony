<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        $students = ["Rihem", "Antoine", "Andrew"];
        $isConnected = true; // Simule la BDD
        $firstName = "Chris";
        $lastName = "Chevalier";
        $today = new DateTime();
        return $this->render('home/index.html.twig', [
            'is_connected' => $isConnected,
            'first_name' => $firstName,
            'last_name' => $lastName,
            "students" => $students,
            "today" => $today
        ]);
    }

    #[Route('/login', name: 'login')]
    public function login(): Response
    {
        return $this->render('home/login.html.twig');
    }
}
