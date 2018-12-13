<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StuationMatrimonialeRepository")
 */
class StuationMatrimoniale
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
    private $nonSm;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Information", mappedBy="Sm")
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

    public function getNonSm(): ?string
    {
        return $this->nonSm;
    }

    public function setNonSm(string $nonSm): self
    {
        $this->nonSm = $nonSm;

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
            $information->setSm($this);
        }

        return $this;
    }

    public function removeInformation(Information $information): self
    {
        if ($this->information->contains($information)) {
            $this->information->removeElement($information);
            // set the owning side to null (unless already changed)
            if ($information->getSm() === $this) {
                $information->setSm(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nonSm;
    }


}
