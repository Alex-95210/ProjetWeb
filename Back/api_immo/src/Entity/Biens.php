<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BiensRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=BiensRepository::class)
 */
class Biens
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
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_place_parking;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_pieces;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Agence::class, inversedBy="biens")
     */
    private $agence;

    /**
     * @ORM\ManyToOne(targetEntity=Clients::class, inversedBy="biens")
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="biens")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=TypeBien::class, mappedBy="bien")
     */
    private $typeBiens;

    /**
     * @ORM\OneToMany(targetEntity=Images::class, mappedBy="bien")
     */
    private $images;

    public function __construct()
    {
        $this->typeBiens = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getNbPlaceParking(): ?int
    {
        return $this->nb_place_parking;
    }

    public function setNbPlaceParking(int $nb_place_parking): self
    {
        $this->nb_place_parking = $nb_place_parking;

        return $this;
    }

    public function getNbPieces(): ?int
    {
        return $this->nb_pieces;
    }

    public function setNbPieces(int $nb_pieces): self
    {
        $this->nb_pieces = $nb_pieces;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|TypeBien[]
     */
    public function getTypeBiens(): Collection
    {
        return $this->typeBiens;
    }

    public function addTypeBien(TypeBien $typeBien): self
    {
        if (!$this->typeBiens->contains($typeBien)) {
            $this->typeBiens[] = $typeBien;
            $typeBien->setBien($this);
        }

        return $this;
    }

    public function removeTypeBien(TypeBien $typeBien): self
    {
        if ($this->typeBiens->removeElement($typeBien)) {
            // set the owning side to null (unless already changed)
            if ($typeBien->getBien() === $this) {
                $typeBien->setBien(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setBien($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getBien() === $this) {
                $image->setBien(null);
            }
        }

        return $this;
    }
}
