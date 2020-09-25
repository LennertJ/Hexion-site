<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $naam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Achternaam;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Clubnaam;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = true;

    /**
     * @ORM\OneToOne(targetEntity=AdditionalInfoUser::class, mappedBy="UserId", cascade={"persist", "remove"})
     */
    private $additionalInfoUser;

    /**
     * @ORM\ManyToMany(targetEntity=FunctieToPerson::class, mappedBy="LidNummer")
     */
    private $Functie;

    public function __construct()
    {
        $this->Functie = new ArrayCollection();
    }

    public function isGranted($role)
    {
        return in_array($role, $this->getRoles());
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(?string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getAchternaam(): ?string
    {
        return $this->Achternaam;
    }

    public function setAchternaam(?string $Achternaam): self
    {
        $this->Achternaam = $Achternaam;

        return $this;
    }

    public function getClubnaam(): ?string
    {
        return $this->Clubnaam;
    }

    public function setClubnaam(?string $Clubnaam): self
    {
        $this->Clubnaam = $Clubnaam;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getIsVerified(): ?bool
    {
        return $this->is_verified;
    }

    public function getAdditionalInfoUser(): ?AdditionalInfoUser
    {
        return $this->additionalInfoUser;
    }

    public function setAdditionalInfoUser(AdditionalInfoUser $additionalInfoUser): self
    {
        $this->additionalInfoUser = $additionalInfoUser;

        // set the owning side of the relation if necessary
        if ($additionalInfoUser->getUserId() !== $this) {
            $additionalInfoUser->setUserId($this);
        }

        return $this;
    }

    /**
     * @return Collection|FunctieToPerson[]
     */
    public function getFunctie(): Collection
    {
        return $this->Functie;
    }

    public function addFunctie(FunctieToPerson $functie): self
    {
        if (!$this->Functie->contains($functie)) {
            $this->Functie[] = $functie;
            $functie->addLidNummer($this);
        }

        return $this;
    }

    public function removeFunctie(FunctieToPerson $functie): self
    {
        if ($this->Functie->contains($functie)) {
            $this->Functie->removeElement($functie);
            $functie->removeLidNummer($this);
        }

        return $this;
    }
}
