<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TypeBienRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TypeBienRepository::class)
 */
class TypeBien
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
    private $label;

    /**
     * @ORM\ManyToOne(targetEntity=Biens::class, inversedBy="typeBiens")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bien;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getBien(): ?Biens
    {
        return $this->bien;
    }

    public function setBien(?Biens $bien): self
    {
        $this->bien = $bien;

        return $this;
    }
}
