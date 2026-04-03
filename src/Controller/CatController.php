<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Form\CatType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CatController extends AbstractController
{
    #[Route("/cat/create", name: "create_cat")]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $cat = new Cat();
        $form = $this->createForm(CatType::class, $cat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($cat); // Met dans la boite
            $em->flush(); // Vide la boite dans la BDD
        }

        return $this->render("cat/form.html.twig", [
            "form" => $form->createView()
        ]);
    }
}
