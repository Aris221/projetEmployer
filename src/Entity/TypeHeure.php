<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeHeureRepository")
 */
class TypeHeure
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
    private $nonType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Information", mappedBy="typeHeure")
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

    public function getNonType(): ?string
    {
        return $this->nonType;
    }

    public function setNonType(string $nonType): self
    {
        $this->nonType = $nonType;

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
            $information->setTypeHeure($this);
        }

        return $this;
    }

    public function removeInformation(Information $information): self
    {
        if ($this->information->contains($information)) {
            $this->information->removeElement($information);
            // set the owning side to null (unless already changed)
            if ($information->getTypeHeure() === $this) {
                $information->setTypeHeure(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nonType;
    }

}
