<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployeRepository")
 * @UniqueEntity(fields="username", message="Telephone deja utilisé")
 */
class Employe implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank()
     * @Assert\Valid()
     * @Assert\Regex(pattern="/^(\+[1-9][0-9][0-9]?)?[0-9]{5,14}$/",message="Veuillez saisire un numero de telephone valide")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Nationalite", inversedBy="employes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nationalite;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Valid()
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Departement", inversedBy="employes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $departement;

    /**
     * @ORM\Column(type="array")
     */
    private $roles;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Enregistre", mappedBy="employe")
     */
    private $enregistres;

    public function __construct() {
        $this->roles = array('ROLE_USER');
        $this->enregistres = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */


    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getNationalite(): ?Nationalite
    {
        return $this->nationalite;
    }

    public function setNationalite(?Nationalite $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $telephone): self
    {
        $this->nom = $telephone;

        return $this;
    }


    public function getDepartement(): ?Departement
    {
        return $this->departement;
    }

    public function setDepartement(?Departement $departement): self
    {
        $this->departement = $departement;

        return $this;
    }


    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles(array $role): self
    {
        $this->roles = $role;

        return $this;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }




    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function __toString()
    {
        return $this->username;
    }

    /**
     * @return Collection|Enregistre[]
     */
    public function getEnregistres(): Collection
    {
        return $this->enregistres;
    }

    public function addEnregistre(Enregistre $enregistre): self
    {
        if (!$this->enregistres->contains($enregistre)) {
            $this->enregistres[] = $enregistre;
            $enregistre->setEmploye($this);
        }

        return $this;
    }

    public function removeEnregistre(Enregistre $enregistre): self
    {
        if ($this->enregistres->contains($enregistre)) {
            $this->enregistres->removeElement($enregistre);
            // set the owning side to null (unless already changed)
            if ($enregistre->getEmploye() === $this) {
                $enregistre->setEmploye(null);
            }
        }

        return $this;
    }

}
