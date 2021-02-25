<?php

namespace App\Entity;

use App\Repository\PatientenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PatientenRepository::class)
 */
class Patienten
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
    private $naam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $postcode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $woonplaats;

    /**
     * @ORM\OneToMany(targetEntity=Recepten::class, mappedBy="patienten")
     */
    private $recepten;

    public function __construct()
    {
        $this->recepten = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getAdres(): ?string
    {
        return $this->adres;
    }

    public function setAdres(string $adres): self
    {
        $this->adres = $adres;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): self
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getWoonplaats(): ?string
    {
        return $this->woonplaats;
    }

    public function setWoonplaats(string $woonplaats): self
    {
        $this->woonplaats = $woonplaats;

        return $this;
    }

    /**
     * @return Collection|Recepten[]
     */
    public function getRecepten(): Collection
    {
        return $this->recepten;
    }

    public function addRecepten(Recepten $recepten): self
    {
        if (!$this->recepten->contains($recepten)) {
            $this->recepten[] = $recepten;
            $recepten->setPatienten($this);
        }

        return $this;
    }

    public function removeRecepten(Recepten $recepten): self
    {
        if ($this->recepten->removeElement($recepten)) {
            // set the owning side to null (unless already changed)
            if ($recepten->getPatienten() === $this) {
                $recepten->setPatienten(null);
            }
        }

        return $this;
    }
}
