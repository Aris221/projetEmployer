<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompteRepository")
 */
class Compte
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
    private $nonCompte;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="compte")
     */
    private $compte;

    public function __construct()
    {
        $this->compte = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNonCompte(): ?string
    {
        return $this->nonCompte;
    }

    public function setNonCompte(string $nonCompte): self
    {
        $this->nonCompte = $nonCompte;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getCompte(): Collection
    {
        return $this->compte;
    }

    public function addCompte(User $compte): self
    {
        if (!$this->compte->contains($compte)) {
            $this->compte[] = $compte;
            $compte->setCompte($this);
        }

        return $this;
    }

    public function removeCompte(User $compte): self
    {
        if ($this->compte->contains($compte)) {
            $this->compte->removeElement($compte);
            // set the owning side to null (unless already changed)
            if ($compte->getCompte() === $this) {
                $compte->setCompte(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
       return $this->nonCompte;
    }

}
