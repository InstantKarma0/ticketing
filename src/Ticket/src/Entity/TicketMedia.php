<?php

namespace App\Ticket\src\Entity;

use App\Common\src\Trait\EntityMetadataTrait;
use App\Ticket\src\Repository\TicketMediaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketMediaRepository::class)]
#[ORM\HasLifecycleCallbacks]
class TicketMedia
{

    use EntityMetadataTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $file = null;

    #[ORM\ManyToOne(inversedBy: 'ticketMedia')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ticket $refTicket = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): static
    {
        $this->file = $file;

        return $this;
    }

    public function getRefTicket(): ?Ticket
    {
        return $this->refTicket;
    }

    public function setRefTicket(?Ticket $refTicket): static
    {
        $this->refTicket = $refTicket;

        return $this;
    }
}
