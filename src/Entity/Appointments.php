<?php

namespace App\Entity;

use App\Entity\Vaccinations;

use App\Repository\AppointmentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointmentsRepository::class)]
class Appointments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $appointment_id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $time = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $notes = null;

    #[ORM\Column(nullable: true)]
    private ?float $price = null;

    //#[ORM\Column]
    //private ?int $billing_id = null;  ////////////////////////////////////////////////////////////////

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    #[ORM\JoinColumn(nullable: false, referencedColumnName: 'doctor_id')]
    private ?Doctors $doctor = null;

    #[ORM\ManyToOne(inversedBy: 'appointments')]
    #[ORM\JoinColumn(nullable: false, referencedColumnName: 'animal_id')]
    private ?Animals $animal = null;


    #[ORM\OneToMany(mappedBy: 'appointment', targetEntity: Procedures::class, cascade: ['persist'])]
    private Collection $procedures;

    #[ORM\OneToMany(mappedBy: 'appointment', targetEntity: Vaccinations::class, cascade: ['persist'])]
    private Collection $vaccinations;

    #[ORM\OneToMany(mappedBy: 'appointment', targetEntity: Prescription::class, cascade: ['persist'])]
    private Collection $prescriptions;

    public function __construct()
    {
        $this->procedures = new ArrayCollection();
        $this->vaccinations = new ArrayCollection();
        $this->prescriptions = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->getDate()->format('d.m.Y'); 
    }
    public function getAppointmentId(): ?int
    {
        return $this->appointment_id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

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

 /*   public function getBillingId(): ?int
    {
        return $this->billing_id;
    }

    public function setBillingId(int $billing_id): self
    {
        $this->billing_id = $billing_id;

        return $this;
    }
*/
    public function getDoctor(): ?Doctors
    {
        return $this->doctor;
    }

    public function setDoctor(?Doctors $doctor): self
    {
        $this->doctor = $doctor;

        return $this;
    }

    public function getAnimal(): ?Animals
    {
        return $this->animal;
    }

    public function setAnimal(?Animals $animal): self
    {
        $this->animal = $animal;

        return $this;
    }

    /**
     * @return Collection<int, Procedures>
     */
    public function getProcedures(): Collection
    {
        return $this->procedures;
    }

    public function addProcedure(Procedures $procedure): self
    {
        if (!$this->procedures->contains($procedure)) {
            $this->procedures->add($procedure);
            $procedure->setAppointment($this);
        }

        return $this;
    }

    public function removeProcedure(Procedures $procedure): self
    {
        if ($this->procedures->removeElement($procedure)) {
            // set the owning side to null (unless already changed)
            if ($procedure->getAppointment() === $this) {
                $procedure->setAppointment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Vaccinations>
     */
    public function getVaccinations(): Collection
    {
        return $this->vaccinations;
    }

    public function addVaccination(Vaccinations $vaccination): self
    {
        if (!$this->vaccinations->contains($vaccination)) {
            $this->vaccinations->add($vaccination);
            $vaccination->setAppointment($this);
        }

        return $this;
    }

    public function removeVaccination(Vaccinations $vaccination): self
    {
        if ($this->vaccinations->removeElement($vaccination)) {
            // set the owning side to null (unless already changed)
            if ($vaccination->getAppointment() === $this) {
                $vaccination->setAppointment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Prescription>
     */
    public function getPrescriptions(): Collection
    {
        return $this->prescriptions;
    }

    public function addPrescription(Prescription $prescription): self
    {
        if (!$this->prescriptions->contains($prescription)) {
            $this->prescriptions->add($prescription);
            $prescription->setAppointment($this);
        }

        return $this;
    }

    public function removePrescription(Prescription $prescription): self
    {
        if ($this->prescriptions->removeElement($prescription)) {
            // set the owning side to null (unless already changed)
            if ($prescription->getAppointment() === $this) {
                $prescription->setAppointment(null);
            }
        }

        return $this;
    }
}
