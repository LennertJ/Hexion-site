<?php

namespace App\Entity;

use App\Repository\FunctieToPersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FunctieToPersonRepository::class)
 */
class FunctieToPerson
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=user::class, inversedBy="Functie")
     */
    private $LidNummer;

    /**
     * @ORM\Column(type="integer")
     */
    private $Jaartal;

    /**
     * @ORM\Column(type="integer")
     */
    private $FunctieId;

    /**
     * @ORM\ManyToOne(targetEntity=Functies::class, inversedBy="functieToPeople")
     */
    private $functieId;

    public function __construct()
    {
        $this->LidNummer = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|user[]
     */
    public function getLidNummer(): Collection
    {
        return $this->LidNummer;
    }

    public function addLidNummer(user $lidNummer): self
    {
        if (!$this->LidNummer->contains($lidNummer)) {
            $this->LidNummer[] = $lidNummer;
        }

        return $this;
    }

    public function removeLidNummer(user $lidNummer): self
    {
        if ($this->LidNummer->contains($lidNummer)) {
            $this->LidNummer->removeElement($lidNummer);
        }

        return $this;
    }

    public function getJaartal(): ?int
    {
        return $this->Jaartal;
    }

    public function setJaartal(int $Jaartal): self
    {
        $this->Jaartal = $Jaartal;

        return $this;
    }

    public function getFunctieId(): ?int
    {
        return $this->FunctieId;
    }

    public function setFunctieId(int $FunctieId): self
    {
        $this->FunctieId = $FunctieId;

        return $this;
    }
}
