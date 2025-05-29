<?php

namespace App\Ticket\src\Entity;

use App\Common\src\Trait\EntityMetadataTrait;
use App\Log\src\Entity\Log;
use App\Ticket\src\Repository\TicketStatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketStatusRepository::class)]
#[ORM\HasLifecycleCallbacks]
class TicketStatus
{

    use EntityMetadataTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Ticket>
     */
    #[ORM\OneToMany(targetEntity: Ticket::class, mappedBy: 'refTicketStatus')]
    private Collection $tickets;

    /**
     * @var Collection<int, Log>
     */
    #[ORM\OneToMany(targetEntity: Log::class, mappedBy: 'refStatusBefore')]
    private Collection $logs;

    public function __construct()
    {
        $this->tickets = new ArrayCollection();
        $this->logs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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
            $ticket->setRefTicketStatus($this);
        }

        return $this;
    }

    public function removeTicket(Ticket $ticket): static
    {
        if ($this->tickets->removeElement($ticket)) {
            // set the owning side to null (unless already changed)
            if ($ticket->getRefTicketStatus() === $this) {
                $ticket->setRefTicketStatus(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Log>
     */
    public function getLogs(): Collection
    {
        return $this->logs;
    }

    public function addLog(Log $log): static
    {
        if (!$this->logs->contains($log)) {
            $this->logs->add($log);
            $log->setRefStatusBefore($this);
        }

        return $this;
    }

    public function removeLog(Log $log): static
    {
        if ($this->logs->removeElement($log)) {
            // set the owning side to null (unless already changed)
            if ($log->getRefStatusBefore() === $this) {
                $log->setRefStatusBefore(null);
            }
        }

        return $this;
    }
}
