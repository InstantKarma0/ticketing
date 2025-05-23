<?php

namespace App\Log\src\Entity;

use App\Common\src\Trait\EntityMetadataTrait;
use App\Log\src\Repository\LogRepository;
use App\Ticket\src\Entity\Ticket;
use App\Ticket\src\Entity\TicketStatus;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LogRepository::class)]
class Log
{

    use EntityMetadataTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'logs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ticket $refTicket = null;

    #[ORM\ManyToOne(inversedBy: 'logs')]
    private ?TicketStatus $refStatusBefore = null;

    #[ORM\ManyToOne(inversedBy: 'logs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TicketStatus $refStatusAfter = null;

    #[ORM\ManyToOne(inversedBy: 'logs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?LogAction $refLogAction = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRefStatusBefore(): ?TicketStatus
    {
        return $this->refStatusBefore;
    }

    public function setRefStatusBefore(?TicketStatus $refStatusBefore): static
    {
        $this->refStatusBefore = $refStatusBefore;

        return $this;
    }

    public function getRefStatusAfter(): ?TicketStatus
    {
        return $this->refStatusAfter;
    }

    public function setRefStatusAfter(?TicketStatus $refStatusAfter): static
    {
        $this->refStatusAfter = $refStatusAfter;

        return $this;
    }

    public function getRefLogAction(): ?LogAction
    {
        return $this->refLogAction;
    }

    public function setRefLogAction(?LogAction $refLogAction): static
    {
        $this->refLogAction = $refLogAction;

        return $this;
    }
}
