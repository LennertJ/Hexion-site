<?php

namespace App\Entity;

use App\Repository\FunctiesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FunctiesRepository::class)
 */
class Functies
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $FunctieId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Titel;

    /**
     * @ORM\Column(type="string", length=1023, nullable=true)
     */
    private $beschrijving;

    /**
     * @ORM\OneToMany(targetEntity=FunctieToPerson::class, mappedBy="functieId")
     */
    private $functieToPeople;

    public function __construct()
    {
        $this->functieToPeople = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTitel(): ?string
    {
        return $this->Titel;
    }

    public function setTitel(string $Titel): self
    {
        $this->Titel = $Titel;

        return $this;
    }

    public function getBeschrijving(): ?string
    {
        return $this->beschrijving;
    }

    public function setBeschrijving(?string $beschrijving): self
    {
        $this->beschrijving = $beschrijving;

        return $this;
    }

    /**
     * @return Collection|FunctieToPerson[]
     */
    public function getFunctieToPeople(): Collection
    {
        return $this->functieToPeople;
    }

    public function addFunctieToPerson(FunctieToPerson $functieToPerson): self
    {
        if (!$this->functieToPeople->contains($functieToPerson)) {
            $this->functieToPeople[] = $functieToPerson;
            $functieToPerson->setFunctieId($this);
        }

        return $this;
    }

    public function removeFunctieToPerson(FunctieToPerson $functieToPerson): self
    {
        if ($this->functieToPeople->contains($functieToPerson)) {
            $this->functieToPeople->removeElement($functieToPerson);
            // set the owning side to null (unless already changed)
            if ($functieToPerson->getFunctieId() === $this) {
                $functieToPerson->setFunctieId(null);
            }
        }

        return $this;
    }
}
