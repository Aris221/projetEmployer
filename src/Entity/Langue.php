<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LangueRepository")
 */
class Langue
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
    private $nonLangue;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Information", mappedBy="langue")
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

    public function getNonLangue(): ?string
    {
        return $this->nonLangue;
    }

    public function setNonLangue(string $nonLangue): self
    {
        $this->nonLangue = $nonLangue;

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
            $information->addLangue($this);
        }

        return $this;
    }

    public function removeInformation(Information $information): self
    {
        if ($this->information->contains($information)) {
            $this->information->removeElement($information);
            $information->removeLangue($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nonLangue;
    }

}
