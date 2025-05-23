<?php

namespace App\User\src\Entity;

use App\Common\src\Trait\EntityMetadataTrait;
use App\Company\src\Entity\Company;
use App\NotificationType\src\Entity\NotificationType;
use App\Ticket\src\Entity\Ticket;
use App\User\src\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{

    use EntityMetadataTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;

    /**
     * @var Collection<int, UserAuthenticator>
     */
    #[ORM\OneToMany(targetEntity: UserAuthenticator::class, mappedBy: 'refUser', orphanRemoval: true)]
    private Collection $userAuthenticators;

    /**
     * @var Collection<int, UserToken>
     */
    #[ORM\OneToMany(targetEntity: UserToken::class, mappedBy: 'refUser')]
    private Collection $userTokens;

    /**
     * @var Collection<int, UserPasswordRequest>
     */
    #[ORM\OneToMany(targetEntity: UserPasswordRequest::class, mappedBy: 'refUser', orphanRemoval: true)]
    private Collection $userPasswordRequests;

    #[ORM\ManyToOne(inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserProfile $refUserProfile = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Company $refCompany = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private ?NotificationType $refNotificationType = null;

    /**
     * @var Collection<int, Ticket>
     */
    #[ORM\OneToMany(targetEntity: Ticket::class, mappedBy: 'refTechnician')]
    private Collection $tickets;


    public function __construct()
    {
        $this->userAuthenticators = new ArrayCollection();
        $this->userTokens = new ArrayCollection();
        $this->userPasswordRequests = new ArrayCollection();
        $this->tickets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
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

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection<int, UserAuthenticator>
     */
    public function getUserAuthenticators(): Collection
    {
        return $this->userAuthenticators;
    }

    public function addUserAuthenticator(UserAuthenticator $userAuthenticator): static
    {
        if (!$this->userAuthenticators->contains($userAuthenticator)) {
            $this->userAuthenticators->add($userAuthenticator);
            $userAuthenticator->setRefUser($this);
        }

        return $this;
    }

    public function removeUserAuthenticator(UserAuthenticator $userAuthenticator): static
    {
        if ($this->userAuthenticators->removeElement($userAuthenticator)) {
            // set the owning side to null (unless already changed)
            if ($userAuthenticator->getRefUser() === $this) {
                $userAuthenticator->setRefUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UserToken>
     */
    public function getUserTokens(): Collection
    {
        return $this->userTokens;
    }

    public function addUserToken(UserToken $userToken): static
    {
        if (!$this->userTokens->contains($userToken)) {
            $this->userTokens->add($userToken);
            $userToken->setRefUser($this);
        }

        return $this;
    }

    public function removeUserToken(UserToken $userToken): static
    {
        if ($this->userTokens->removeElement($userToken)) {
            // set the owning side to null (unless already changed)
            if ($userToken->getRefUser() === $this) {
                $userToken->setRefUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UserPasswordRequest>
     */
    public function getUserPasswordRequests(): Collection
    {
        return $this->userPasswordRequests;
    }

    public function addUserPasswordRequest(UserPasswordRequest $userPasswordRequest): static
    {
        if (!$this->userPasswordRequests->contains($userPasswordRequest)) {
            $this->userPasswordRequests->add($userPasswordRequest);
            $userPasswordRequest->setRefUser($this);
        }

        return $this;
    }

    public function removeUserPasswordRequest(UserPasswordRequest $userPasswordRequest): static
    {
        if ($this->userPasswordRequests->removeElement($userPasswordRequest)) {
            // set the owning side to null (unless already changed)
            if ($userPasswordRequest->getRefUser() === $this) {
                $userPasswordRequest->setRefUser(null);
            }
        }

        return $this;
    }

    public function getRefUserProfile(): ?UserProfile
    {
        return $this->refUserProfile;
    }

    public function setRefUserProfile(?UserProfile $refUserProfile): static
    {
        $this->refUserProfile = $refUserProfile;

        return $this;
    }

    public function getRefCompany(): ?Company
    {
        return $this->refCompany;
    }

    public function setRefCompany(?Company $refCompany): static
    {
        $this->refCompany = $refCompany;

        return $this;
    }

    public function getRefNotificationType(): ?NotificationType
    {
        return $this->refNotificationType;
    }

    public function setRefNotificationType(?NotificationType $refNotificationType): static
    {
        $this->refNotificationType = $refNotificationType;

        return $this;
    }

    /**
     * @return Collection<int, Ticket>
     */
    public function getTickets(): Collection
    {
        return $this->tickets;
    }

    public function addTicket(Ticket $ticket): static
    {
        if (!$this->tickets->contains($ticket)) {
            $this->tickets->add($ticket);
            $ticket->setRefTechnician($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): static
    {
        if ($this->tickets->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getRefTechnician() === $this) {
                $ticket->setRefTechnician(null);
            }
        }

        return $this;
    }
}
