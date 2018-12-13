<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TravailleRepository")
 */
class Travaille
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
    private $nonTravaille;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Information", mappedBy="travaille")
     *
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

    public function getNonTravaille(): ?string
    {
        return $this->nonTravaille;
    }

    public function setNonTravaille(string $nonTravaille): self
    {
        $this->nonTravaille = $nonTravaille;

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
            $information->addTravaille($this);
        }

        return $this;
    }

    public function removeInformation(Information $information): self
    {
        if ($this->information->contains($information)) {
            $this->information->removeElement($information);
            $information->removeTravaille($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nonTravaille;
    }

}
