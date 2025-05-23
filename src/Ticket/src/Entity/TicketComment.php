<?php

namespace App\Ticket\src\Entity;

use App\Common\src\Trait\EntityMetadataTrait;
use App\Ticket\src\Repository\TicketCommentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketCommentRepository::class)]
class TicketComment
{

    use EntityMetadataTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[ORM\ManyToOne(inversedBy: 'ticketComments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ticket $refTicket = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

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
