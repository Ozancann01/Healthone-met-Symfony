<?php

namespace App\Entity;

use App\Repository\MedicijnenRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MedicijnenRepository::class)
 */
class Medicijnen
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
    private $Naam;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $werking;


    /**
     * @ORM\Column(type="text", length=255)
     */
    private $Bijwerkingen;

    /**
     * @ORM\Column(type="integer")
     */
    private $Prijs;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Verzekerd;

    /**
     * @ORM\OneToMany(targetEntity=Recepten::class, mappedBy="medicijnen")
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
        return $this->Naam;
    }

    public function setNaam(string $Naam): self
    {
        $this->Naam = $Naam;

        return $this;
    }
    public function getWerking(): ?string
    {
        return $this->werking;
    }
    public function setWerking(string $werking){
        $this->werking=$werking;
        return $this;
    }

    public function getBijwerkingen(): ?string
    {
        return $this->Bijwerkingen;
    }

    public function setBijwerkingen(string $Bijwerkingen): self
    {
        $this->Bijwerkingen = $Bijwerkingen;

        return $this;
    }

    public function getPrijs(): ?string
    {
        return $this->Prijs;
    }

    public function setPrijs(string $Prijs): self
    {
        $this->Prijs = $Prijs;

        return $this;
    }

    public function getVerzekerd(): ?bool
    {
        return $this->Verzekerd;
    }

    public function setVerzekerd(bool $Verzekerd): self
    {
        $this->Verzekerd = $Verzekerd;

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
            $recepten->setMedicijnen($this);
        }

        return $this;
    }

    public function removeRecepten(Recepten $recepten): self
    {
        if ($this->recepten->removeElement($recepten)) {
            // set the owning side to null (unless already changed)
            if ($recepten->getMedicijnen() === $this) {
                $recepten->setMedicijnen(null);
            }
        }

        return $this;
    }
}
