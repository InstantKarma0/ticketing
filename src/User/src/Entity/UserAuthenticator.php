<?php

namespace App\User\src\Entity;

use App\Common\src\Trait\EntityMetadataTrait;
use App\User\src\Repository\UserAuthenticatorRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserAuthenticatorRepository::class)]
class UserAuthenticator
{

    use EntityMetadataTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $secret = null;

    #[ORM\ManyToOne(inversedBy: 'userAuthenticators')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $refUser = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $validateAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSecret(): ?string
    {
        return $this->secret;
    }

    public function setSecret(string $secret): static
    {
        $this->secret = $secret;

        return $this;
    }

    public function getRefUser(): ?User
    {
        return $this->refUser;
    }

    public function setRefUser(?User $refUser): static
    {
        $this->refUser = $refUser;

        return $this;
    }

    public function getValidateAt(): ?\DateTimeImmutable
    {
        return $this->validateAt;
    }

    public function setValidateAt(\DateTimeImmutable $validateAt): static
    {
        $this->validateAt = $validateAt;

        return $this;
    }
}
