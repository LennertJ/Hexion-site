<?php

namespace App\Entity;

use App\Repository\AdditionalInfoUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdditionalInfoUserRepository::class)
 */
class AdditionalInfoUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="additionalInfoUser", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $UserId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $levensMotto;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $studieRichting;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $CantusLied;

    /**
     * @ORM\Column(type="string", length=1024, nullable=true)
     */
    private $Beschrijving;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?User
    {
        return $this->UserId;
    }

    public function setUserId(User $UserId): self
    {
        $this->UserId = $UserId;

        return $this;
    }

    public function getLevensMotto(): ?string
    {
        return $this->levensMotto;
    }

    public function setLevensMotto(?string $levensMotto): self
    {
        $this->levensMotto = $levensMotto;

        return $this;
    }

    public function getStudieRichting(): ?string
    {
        return $this->studieRichting;
    }

    public function setStudieRichting(?string $studieRichting): self
    {
        $this->studieRichting = $studieRichting;

        return $this;
    }

    public function getCantusLied(): ?string
    {
        return $this->CantusLied;
    }

    public function setCantusLied(?string $CantusLied): self
    {
        $this->CantusLied = $CantusLied;

        return $this;
    }

    public function getBeschrijving(): ?string
    {
        return $this->Beschrijving;
    }

    public function setBeschrijving(?string $Beschrijving): self
    {
        $this->Beschrijving = $Beschrijving;

        return $this;
    }
}
