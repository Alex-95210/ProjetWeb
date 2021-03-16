<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity=Agence::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agence;

    /**
     * @ORM\ManyToMany(targetEntity=Clients::class, mappedBy="users")
     */
    private $clients;

    /**
     * @ORM\OneToMany(targetEntity=Biens::class, mappedBy="user")
     */
    private $biens;

    public function __construct()
    {
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getAgence(): ?Agence
    {
        return $this->agence;
    }

    public function setAgence(?Agence $agence): self
    {
        $this->agence = $agence;

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
            $client->addUser($this);
        }

        return $this;
    }

    public function removeClient(Clients $client): self
    {
        if ($this->clients->removeElement($client)) {
            $client->removeUser($this);
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
            $bien->setUser($this);
        }

        return $this;
    }

    public function removeBien(Biens $bien): self
    {
        if ($this->biens->removeElement($bien)) {
            // set the owning side to null (unless already changed)
            if ($bien->getUser() === $this) {
                $bien->setUser(null);
            }
        }

        return $this;
    }
}
