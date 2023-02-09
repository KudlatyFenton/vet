<?php

namespace App\Entity;

use App\Repository\ProceduresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProceduresRepository::class)]
class Procedures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $procedure_id = null;

    #[ORM\Column(length: 255)]
    private ?string $procedure_name = null;


    #[ORM\Column(length: 255, nullable: true)]
    private ?string $notes = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\ManyToOne(inversedBy: 'procedures')]
    #[ORM\JoinColumn(nullable: true, referencedColumnName: 'appointment_id')]
    private ?Appointments $appointment = null;


    public function __toString()
    {
        return $this->procedure_name; 
    }

    public function getProcedureId(): ?int
    {
        return $this->procedure_id;
    }

    public function getProcedureName(): ?string
    {
        return $this->procedure_name;
    }

    public function setProcedureName(string $procedure_name): self
    {
        $this->procedure_name = $procedure_name;

        return $this;
    }

  
    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

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
