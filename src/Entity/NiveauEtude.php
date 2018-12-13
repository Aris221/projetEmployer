<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NiveauEtudeRepository")
 */
class NiveauEtude
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
    private $nonNiveau;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Information", mappedBy="niveauEtude")
     */
    private $information;

    public function __construct()
    {
        $this->employers = new ArrayCollection();
        $this->information = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNonNiveau(): ?string
    {
        return $this->nonNiveau;
    }

    public function setNonNiveau(string $nonNiveau): self
    {
        $this->nonNiveau = $nonNiveau;

        return $this;
    }


    public function __toString() {
        return $this->nonNiveau;
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
            $information->setNiveauEtude($this);
        }

        return $this;
    }

    public function removeInformation(Information $information): self
    {
        if ($this->information->contains($information)) {
            $this->information->removeElement($information);
            // set the owning side to null (unless already changed)
            if ($information->getNiveauEtude() === $this) {
                $information->setNiveauEtude(null);
            }
        }

        return $this;
    }
}
