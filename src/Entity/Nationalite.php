<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NationaliteRepository")
 */
class Nationalite
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
    private $nomNationalite;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Employe", mappedBy="nationalite")
     */
    private $employes;

    public function __construct()
    {
        $this->nationalite = new ArrayCollection();
        $this->employes = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNomNationalite(): ?string
    {
        return $this->nomNationalite;
    }

    public function setNomNationalite(string $nomNationalite): self
    {
        $this->nomNationalite = $nomNationalite;

        return $this;
    }

    public function __toString() {
        return $this->nomNationalite;
    }

    /**
     * @return Collection|Employe[]
     */
    public function getEmployes(): Collection
    {
        return $this->employes;
    }

    public function addEmploye(Employe $employe): self
    {
        if (!$this->employes->contains($employe)) {
            $this->employes[] = $employe;
            $employe->setNationalite($this);
        }

        return $this;
    }

    public function removeEmploye(Employe $employe): self
    {
        if ($this->employes->contains($employe)) {
            $this->employes->removeElement($employe);
            // set the owning side to null (unless already changed)
            if ($employe->getNationalite() === $this) {
                $employe->setNationalite(null);
            }
        }

        return $this;
    }
}
