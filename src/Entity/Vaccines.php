<?php

namespace App\Entity;

use App\Entity\Vaccinations;
use App\Repository\VaccinesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VaccinesRepository::class)]
class Vaccines
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $vaccine_id = null;

    #[ORM\Column(length: 255)]
    private ?string $vaccine_name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\OneToMany(mappedBy: 'vaccine', targetEntity: Vaccinations::class)]
    private Collection $vaccinations;

    public function __construct()
    {
        $this->vaccinations = new ArrayCollection();
    }

    public function __toString(){
        return $this->vaccine_name; 
      }

    public function getVaccineId(): ?int
    {
        return $this->vaccine_id;
    }

    public function getVaccineName(): ?string
    {
        return $this->vaccine_name;
    }

    public function setVaccineName(string $vaccine_name): self
    {
        $this->vaccine_name = $vaccine_name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

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
            $vaccination->setVaccine($this);
        }

        return $this;
    }

    public function removeVaccination(Vaccinations $vaccination): self
    {
        if ($this->vaccinations->removeElement($vaccination)) {
            // set the owning side to null (unless already changed)
            if ($vaccination->getVaccine() === $this) {
                $vaccination->setVaccine(null);
            }
        }

        return $this;
    }
}
