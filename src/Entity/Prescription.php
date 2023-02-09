<?php

namespace App\Entity;

use App\Repository\PrescriptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrescriptionRepository::class)]
class Prescription
{
    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'prescriptions')]
    #[ORM\JoinColumn(nullable: false,  referencedColumnName: 'appointment_id')]
    private ?Appointments $appointment = null;

    #[ORM\ManyToOne(inversedBy: 'prescriptions')]
    #[ORM\JoinColumn(nullable: false,  referencedColumnName: 'medication_id')]
    private ?Medications $medication = null;

    public function getAppointment(): ?Appointments
    {
        return $this->appointment;
    }

    public function setAppointment(?Appointments $appointment): self
    {
        $this->appointment = $appointment;

        return $this;
    }

    public function getMedication(): ?Medications
    {
        return $this->medication;
    }

    public function setMedication(?Medications $medication): self
    {
        $this->medication = $medication;

        return $this;
    }
}
