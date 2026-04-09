<?php

namespace App\Controller;

use App\Entity\Owner;
use App\Form\OwnerType;
use App\Repository\OwnerRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class OwnerController extends AbstractController
{
    #[Route('/owner/create', name: 'create_owner')]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $owner = new Owner();
        $form = $this->createForm(OwnerType::class, $owner);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->persist($owner); // Met dans la boite
            $em->flush(); // Vide la boite dans la BDD
            return $this->redirectToRoute("home");
        }

        return $this->render("owner/form.html.twig", [
            "form" => $form->createView()
        ]);
    }

    #[Route('/owner/update/{id}', name: 'update_owner')]
    public function update(Request $request, ManagerRegistry $doctrine, Owner $owner): Response
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");

        $form = $this->createForm(OwnerType::class, $owner);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush(); // Vide la boite dans la BDD
            return $this->redirectToRoute("home");
        }

        return $this->render("owner/form.html.twig", [
            "form" => $form->createView()
        ]);
    }

    #[Route('/owner/delete/{id}', name: 'delete_owner')]
    public function delete(ManagerRegistry $doctrine, Owner $owner): Response
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");

        $em = $doctrine->getManager();
        $em->remove($owner);
        $em->flush(); // Vide la boite dans la BDD

        return $this->redirectToRoute("home");
    }

    #[Route('/', name: 'home')]
    public function readAll(OwnerRepository $ownerRepository): Response
    {
        $owners = $ownerRepository->findAll();
        return $this->render("home/index.html.twig", [
            "owners" => $owners
        ]);
    }
}
