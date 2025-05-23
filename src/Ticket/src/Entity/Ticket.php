<?php

namespace App\Ticket\src\Entity;

use App\Common\src\Trait\EntityMetadataTrait;
use App\Log\src\Entity\Log;
use App\Ticket\src\Repository\TicketRepository;
use App\User\src\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TicketRepository::class)]
class Ticket
{

    use EntityMetadataTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, TicketMedia>
     */
    #[ORM\OneToMany(targetEntity: TicketMedia::class, mappedBy: 'refTicket', orphanRemoval: true)]
    private Collection $ticketMedia;

    /**
     * @var Collection<int, TicketComment>
     */
    #[ORM\OneToMany(targetEntity: TicketComment::class, mappedBy: 'refTicket', orphanRemoval: true)]
    private Collection $ticketComments;

    #[ORM\ManyToOne(inversedBy: 'tickets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TicketType $refTicketType = null;

    #[ORM\ManyToOne(inversedBy: 'tickets')]
    private ?TicketPriority $refTicketPriority = null;

    #[ORM\ManyToOne(inversedBy: 'tickets')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TicketStatus $refTicketStatus = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\ManyToOne(inversedBy: 'tickets')]
    private ?User $refTechnician = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @var Collection<int, Log>
     */
    #[ORM\OneToMany(targetEntity: Log::class, mappedBy: 'refTicket', orphanRemoval: true)]
    private Collection $logs;

    public function __construct()
    {
        $this->ticketMedia = new ArrayCollection();
        $this->ticketComments = new ArrayCollection();
        $this->logs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, TicketMedia>
     */
    public function getTicketMedia(): Collection
    {
        return $this->ticketMedia;
    }

    public function addTicketMedium(TicketMedia $ticketMedium): static
    {
        if (!$this->ticketMedia->contains($ticketMedium)) {
            $this->ticketMedia->add($ticketMedium);
            $ticketMedium->setRefTicket($this);
        }

        return $this;
    }

    public function removeTicketMedium(TicketMedia $ticketMedium): static
    {
        if ($this->ticketMedia->removeElement($ticketMedium)) {
            // set the owning side to null (unless already changed)
            if ($ticketMedium->getRefTicket() === $this) {
                $ticketMedium->setRefTicket(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TicketComment>
     */
    public function getTicketComments(): Collection
    {
        return $this->ticketComments;
    }

    public function addTicketComment(TicketComment $ticketComment): static
    {
        if (!$this->ticketComments->contains($ticketComment)) {
            $this->ticketComments->add($ticketComment);
            $ticketComment->setRefTicket($this);
        }

        return $this;
    }

    public function removeTicketComment(TicketComment $ticketComment): static
    {
        if ($this->ticketComments->removeElement($ticketComment)) {
            // set the owning side to null (unless already changed)
            if ($ticketComment->getRefTicket() === $this) {
                $ticketComment->setRefTicket(null);
            }
        }

        return $this;
    }

    public function getRefTicketType(): ?TicketType
    {
        return $this->refTicketType;
    }

    public function setRefTicketType(?TicketType $refTicketType): static
    {
        $this->refTicketType = $refTicketType;

        return $this;
    }

    public function getRefTicketPriority(): ?TicketPriority
    {
        return $this->refTicketPriority;
    }

    public function setRefTicketPriority(?TicketPriority $refTicketPriority): static
    {
        $this->refTicketPriority = $refTicketPriority;

        return $this;
    }

    public function getRefTicketStatus(): ?TicketStatus
    {
        return $this->refTicketStatus;
    }

    public function setRefTicketStatus(?TicketStatus $refTicketStatus): static
    {
        $this->refTicketStatus = $refTicketStatus;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getRefTechnician(): ?User
    {
        return $this->refTechnician;
    }

    public function setRefTechnician(?User $refTechnician): static
    {
        $this->refTechnician = $refTechnician;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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
            $log->setRefTicket($this);
        }

        return $this;
    }

    public function removeLog(Log $log): static
    {
        if ($this->logs->removeElement($log)) {
            // set the owning side to null (unless already changed)
            if ($log->getRefTicket() === $this) {
                $log->setRefTicket(null);
            }
        }

        return $this;
    }
}
