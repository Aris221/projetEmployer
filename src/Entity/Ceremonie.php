<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CeremonieRepository")
 */
class Ceremonie
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
    private $nomCeremonie;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Information", mappedBy="ceremonie")
     */
    private $information;

    public function __construct()
    {
        $this->information = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNomCeremonie(): ?string
    {
        return $this->nomCeremonie;
    }

    public function setNomCeremonie(string $nomCeremonie): self
    {
        $this->nomCeremonie = $nomCeremonie;

        return $this;
    }

    /**
     * @return Collection|Information[]
     */
    public function getInformation(): Collection
    {
        return $this->information;
    }

    public function addInformation(Information $information): self
    {
        if (!$this->information->contains($information)) {
            $this->information[] = $information;
            $information->addCeremonie($this);
        }

        return $this;
    }

    public function removeInformation(Information $information): self
    {
        if ($this->information->contains($information)) {
            $this->information->removeElement($information);
            $information->removeCeremonie($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nomCeremonie;
    }

}
