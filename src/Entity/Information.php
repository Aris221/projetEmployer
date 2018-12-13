<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InformationRepository")
 */
class Information
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Employe", cascade={"persist", "remove"})
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    private $employer;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    private $age;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Langue", inversedBy="information")
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    private $langue;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StuationMatrimoniale", inversedBy="information")
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    private $Sm;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Travaille", inversedBy="information")
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    private $travaille;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeHeure", inversedBy="information")
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    private $typeHeure;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Ceremonie", inversedBy="information")
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    private $ceremonie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\NiveauEtude", inversedBy="information")
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    private $niveauEtude;

    public function __construct()
    {
        $this->langue = new ArrayCollection();
        $this->travaille = new ArrayCollection();
        $this->ceremonie = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmployer(): ?Employe
    {
        return $this->employer;
    }

    public function setEmployer(?Employe $employer): self
    {
        $this->employer = $employer;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): self
    {
        $this->age = $age;

        return $this;
    }

    /**
     * @return Collection|Langue[]
     */
    public function getLangue(): Collection
    {
        return $this->langue;
    }

    public function addLangue(Langue $langue): self
    {
        if (!$this->langue->contains($langue)) {
            $this->langue[] = $langue;
        }

        return $this;
    }

    public function removeLangue(Langue $langue): self
    {
        if ($this->langue->contains($langue)) {
            $this->langue->removeElement($langue);
        }

        return $this;
    }

    public function getSm(): ?StuationMatrimoniale
    {
        return $this->Sm;
    }

    public function setSm(?StuationMatrimoniale $Sm): self
    {
        $this->Sm = $Sm;

        return $this;
    }

    /**
     * @return Collection|Travaille[]
     */
    public function getTravaille(): Collection
    {
        return $this->travaille;
    }

    public function addTravaille(Travaille $travaille): self
    {
        if (!$this->travaille->contains($travaille)) {
            $this->travaille[] = $travaille;
        }

        return $this;
    }

    public function removeTravaille(Travaille $travaille): self
    {
        if ($this->travaille->contains($travaille)) {
            $this->travaille->removeElement($travaille);
        }

        return $this;
    }

    public function getTypeHeure(): ?TypeHeure
    {
        return $this->typeHeure;
    }

    public function setTypeHeure(?TypeHeure $typeHeure): self
    {
        $this->typeHeure = $typeHeure;

        return $this;
    }

    /**
     * @return Collection|Ceremonie[]
     */
    public function getCeremonie(): Collection
    {
        return $this->ceremonie;
    }

    public function addCeremonie(Ceremonie $ceremonie): self
    {
        if (!$this->ceremonie->contains($ceremonie)) {
            $this->ceremonie[] = $ceremonie;
        }

        return $this;
    }

    public function removeCeremonie(Ceremonie $ceremonie): self
    {
        if ($this->ceremonie->contains($ceremonie)) {
            $this->ceremonie->removeElement($ceremonie);
        }

        return $this;
    }

    public function getNiveauEtude(): ?NiveauEtude
    {
        return $this->niveauEtude;
    }

    public function setNiveauEtude(?NiveauEtude $niveauEtude): self
    {
        $this->niveauEtude = $niveauEtude;

        return $this;
    }

    public function __toString()
    {
        $id1 = $this->id.'';
        return $id1;
    }


}
