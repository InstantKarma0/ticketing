<?php

namespace App\User\src\Entity;

use App\Common\src\Trait\EntityMetadataTrait;
use App\User\src\Repository\UserPasswordRequestRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: UserPasswordRequestRepository::class)]
class UserPasswordRequest
{

    use EntityMetadataTrait;

    private const string VALIDITY_TIME = "+15 minutes"; // Request validity time


    public function __construct()
    {
        // Set the default values
        $this->generateUniqId();
        $this->expireAt = new \DateTimeImmutable(self::VALIDITY_TIME);
    }


    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'userPasswordRequests')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $refUser = null;

    #[ORM\Column(type: UuidType::NAME, unique: true)]
    private Uuid $uniqId;

    #[ORM\Column]
    private ?\DateTimeImmutable $expireAt = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUniqId(): ?Uuid
    {
        return $this->uniqId;
    }

    public function generateUniqId(): static
    {
        $this->uniqId = Uuid::v4();
    }

    public function getExpireAt(): ?\DateTimeImmutable
    {
        return $this->expireAt;
    }
}
