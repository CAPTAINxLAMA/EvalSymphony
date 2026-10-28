<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoRepository::class)]
class Photo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $datePriseVue = null;

    #[ORM\Column(length: 50)]
    private ?string $nomFichier = null;

    #[ORM\Column(length: 50)]
    private ?string $etatOeuvre = null;

    #[ORM\ManyToOne(inversedBy: 'photos')]
    private ?Oeuvre $oeuvre = null;

    #[ORM\ManyToOne(inversedBy: 'photos')]
    private ?Benevole $benevole = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatePriseVue(): ?\DateTime
    {
        return $this->datePriseVue;
    }

    public function setDatePriseVue(?\DateTime $datePriseVue): static
    {
        $this->datePriseVue = $datePriseVue;

        return $this;
    }

    public function getNomFichier(): ?string
    {
        return $this->nomFichier;
    }

    public function setNomFichier(string $nomFichier): static
    {
        $this->nomFichier = $nomFichier;

        return $this;
    }

    public function getEtatOeuvre(): ?string
    {
        return $this->etatOeuvre;
    }

    public function setEtatOeuvre(string $etatOeuvre): static
    {
        $this->etatOeuvre = $etatOeuvre;

        return $this;
    }

    public function getOeuvre(): ?Oeuvre
    {
        return $this->oeuvre;
    }

    public function setOeuvre(?Oeuvre $oeuvre): static
    {
        $this->oeuvre = $oeuvre;

        return $this;
    }

    public function getBenevole(): ?Benevole
    {
        return $this->benevole;
    }

    public function setBenevole(?Benevole $benevole): static
    {
        $this->benevole = $benevole;

        return $this;
    }
}
