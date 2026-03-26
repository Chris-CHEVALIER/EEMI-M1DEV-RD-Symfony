<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LuckyController extends AbstractController
{
    #[Route("/lucky/number")]
    public function randomNumber(): Response
    {
        $randomNumber = random_int(0, 100);
        return new Response("<html><h2>Mon nombre fétiche => $randomNumber</h2></html>");
    }

    #[Route("/welcome", name: "welcome")]
    public function welcome(Request $request): Response
    {
        $firstName = $request->query->get("firstName");
        $lastName = $request->query->get("lastName");
        if (!$lastName || !$firstName) {
            throw $this->createNotFoundException("Les nom ou le prénom n'est pas défini !");
        }
        return $this->render("welcome.html.twig", ["lastName" => $lastName, "firstName" => $firstName]);
    }
}
