<?php

namespace App\Controller;

use App\Entity\Doctors;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DoctorController extends AbstractController
{
    #[Route('/doctor', name: 'app_doctor')]
    public function index(): Response
    {
        return $this->render('doctor/index.html.twig', [
            'controller_name' => 'DoctorController',
        ]);
    }

    #[Route('/doctor/{id}', name: 'doctor_show')]
    public function show(ManagerRegistry $doctrine, int $id): Response
    {
        $doctor = $doctrine->getRepository(Doctors::class)->find($id);

        if (!$doctor) {
            throw $this->createNotFoundException(
                'No doctor found for id '.$id
            );
        }

        return new Response('Check out this great '.$doctor->getSpecialty().' doctor: '.$doctor->getName());
    }
    
}
