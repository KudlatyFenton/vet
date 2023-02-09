<?php

namespace App\Entity;

use App\Repository\VaccinationsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VaccinationsRepository::class)]
class Vaccinations
{



    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_administered = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $expiry_date = null;

    #[ORM\ManyToOne(targetEntity: Vaccines::class, inversedBy: 'vaccinations')]
    #[ORM\JoinColumn(nullable: true, referencedColumnName: 'vaccine_id')]
    private ?Vaccines $vaccine = null;


    #[ORM\Id]
    #[ORM\ManyToOne(inversedBy: 'vaccinations')]
    #[ORM\JoinColumn(nullable: false, referencedColumnName: 'appointment_id')]
    private ?Appointments $appointment = null;



    public function getDateAdministered(): ?\DateTimeInterface
    {
        return $this->date_administered;
    }

    public function setDateAdministered(\DateTimeInterface $date_administered): self
    {
        $this->date_administered = $date_administered;

        return $this;
    }

    public function getExpiryDate(): ?\DateTimeInterface
    {
        return $this->expiry_date;
    }

    public function setExpiryDate(\DateTimeInterface $expiry_date): self
    {
        $this->expiry_date = $expiry_date;

        return $this;
    }

    public function getVaccine(): ?Vaccines
    {
        return $this->vaccine;
    }

    public function setVaccine(?Vaccines $vaccine): self
    {
        $this->vaccine = $vaccine;

        return $this;
    }

    public function getAppointment(): ?Appointments
    {
        return $this->appointment;
    }

    public function setAppointment(?Appointments $appointment): self
    {
        $this->appointment = $appointment;

        return $this;
    }
}
