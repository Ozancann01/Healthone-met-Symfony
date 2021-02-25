<?php

namespace App\Entity;

use App\Repository\ReceptenRepository;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReceptenRepository::class)
 */
class Recepten
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $periode;

    /**
     * @ORM\ManyToOne(targetEntity=Medicijnen::class, inversedBy="recepten")
     * @ORM\JoinColumn(nullable=false)
     */
    private $medicijnen;

    /**
     * @ORM\ManyToOne(targetEntity=Patienten::class, inversedBy="recepten")
     */
    private $patienten;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(string $periode): self
    {
        $this->periode = $periode;

        return $this;
    }
    public function getMedicijnen(): ?Medicijnen
    {
        return $this->medicijnen;
    }

    public function setMedicijnen(?Medicijnen $medicijnen): self
    {
        $this->medicijnen = $medicijnen;

        return $this;
    }

    public function getPatienten(): ?Patienten
    {
        return $this->patienten;
    }

    public function setPatienten(?Patienten $patienten): self
    {
        $this->patienten = $patienten;

        return $this;
    }
}
