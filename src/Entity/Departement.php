<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepartementRepository")
 */
class Departement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nonDepartement;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Employe", mappedBy="departement")
     */
    private $departement;

    public function __construct()
    {
        $this->departement = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNonDepartement(): ?string
    {
        return $this->nonDepartement;
    }

    public function setNonDepartement(string $nonDepartement): self
    {
        $this->nonDepartement = $nonDepartement;

        return $this;
    }

    /**
     * @return Collection|Employe[]
     */
    public function getDepartement(): Collection
    {
        return $this->departement;
    }

    public function addDepartement(Employe $departement): self
    {
        if (!$this->departement->contains($departement)) {
            $this->departement[] = $departement;
            $departement->setDepartement($this);
        }

        return $this;
    }

    public function removeDepartement(Employe $departement): self
    {
        if ($this->departement->contains($departement)) {
            $this->departement->removeElement($departement);
            // set the owning side to null (unless already changed)
            if ($departement->getDepartement() === $this) {
                $departement->setDepartement(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->nonDepartement;
    }
}
