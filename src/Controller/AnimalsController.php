<?php

namespace App\Controller;

use App\Entity\Animals;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimalsController extends AbstractController
{
    #[Route('/animals', name: 'app_animals')]
    public function index(): Response
    {
        return $this->render('animals/index.html.twig', [
            'controller_name' => 'AnimalsController',
        ]);
    }

    #[Route('/animals/{id}', name: 'animals_show')]
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $animal = $doctrine->getRepository(Animals::class)->find($id);

        if (!$animal) {
            throw $this->createNotFoundException(
                'No animal found for id '.$id
            );
        }

        return new Response('Check out this great '.$animal->getBreed().'. Its name is: '.$animal->getName());
    }
}
