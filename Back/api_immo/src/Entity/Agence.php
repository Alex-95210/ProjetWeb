<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AgenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AgenceRepository::class)
 */
class Agence
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity=Users::class, mappedBy="agence", orphanRemoval=true)
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=Clients::class, mappedBy="Agence")
     */
    private $clients;

    /**
     * @ORM\OneToMany(targetEntity=Biens::class, mappedBy="agence")
     */
    private $biens;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->clients = new ArrayCollection();
        $this->biens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setAgence($this);
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getAgence() === $this) {
                $user->setAgence(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Clients[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Clients $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->setAgence($this);
        }

        return $this;
    }

    public function removeClient(Clients $client): self
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getAgence() === $this) {
                $client->setAgence(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Biens[]
     */
    public function getBiens(): Collection
    {
        return $this->biens;
    }

    public function addBien(Biens $bien): self
    {
        if (!$this->biens->contains($bien)) {
            $this->biens[] = $bien;
            $bien->setAgence($this);
        }

        return $this;
    }

    public function removeBien(Biens $bien): self
    {
        if ($this->biens->removeElement($bien)) {
            // set the owning side to null (unless already changed)
            if ($bien->getAgence() === $this) {
                $bien->setAgence(null);
            }
        }

        return $this;
    }
}
