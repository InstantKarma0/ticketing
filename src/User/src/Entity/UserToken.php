<?php

namespace App\User\src\Entity;

use App\Common\src\Trait\EntityMetadataTrait;
use App\User\src\Repository\UserTokenRepository;
use Doctrine\ORM\Mapping as ORM;
use Random\RandomException;

#[ORM\Entity(repositoryClass: UserTokenRepository::class)]
#[ORM\HasLifecycleCallbacks]
class UserToken
{

    use EntityMetadataTrait;

    private const string LONG_TOKEN_VALIDITY_TIME = "+30 days"; // Long token validity time
    private const string SHORT_TOKEN_VALIDITY_TIME = "+1 hour"; // Short token validity time

    /**
     * @throws RandomException
     */
    public function __construct()
    {
        // Set the default values
        $this->longTokenExpireAt = new \DateTimeImmutable(self::LONG_TOKEN_VALIDITY_TIME);
        $this->shortTokenExpireAt = new \DateTime(self::SHORT_TOKEN_VALIDITY_TIME);

        // Generate tokens
        $this->longToken = bin2hex(random_bytes(40));
        $this->shortToken = bin2hex(random_bytes(10));
    }

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'userTokens')]
    private ?User $refUser = null;

    #[ORM\Column(length: 80, unique: true)]
    private string $longToken;

    #[ORM\Column(length: 20, unique: true)]
    private string $shortToken;

    #[ORM\Column]
    private \DateTime $shortTokenExpireAt;

    #[ORM\Column]
    private \DateTimeImmutable $longTokenExpireAt;

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

    public function getLongToken(): string
    {
        return $this->longToken;
    }

    public function getShortToken(): string
    {
        return $this->shortToken;
    }

    /**
     * @throws RandomException
     */
    public function refreshShortToken(): static
    {
        $this->shortToken = bin2hex(random_bytes(10));
        $this->shortTokenExpireAt = new \DateTime(self::SHORT_TOKEN_VALIDITY_TIME);

        return $this;
    }

    public function getShortTokenExpireAt(): \DateTime
    {
        return $this->shortTokenExpireAt;
    }

    public function getLongTokenExpireAt(): ?\DateTimeImmutable
    {
        return $this->longTokenExpireAt;
    }
}
