<?php

namespace App\Entity;

use App\Repository\InscriptionsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InscriptionsRepository::class)
 */
class Inscriptions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_inscription;

    /**
     * @ORM\ManyToOne(targetEntity=Sorties::class)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="no_sortie")
     */
    private $sorties_no_sortie;

    /**
     * @ORM\ManyToOne(targetEntity=Participants::class)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     */
    private $participants_no_participant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(\DateTimeInterface $date_inscription): self
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    public function getSortiesNoSortie(): ?Sorties
    {
        return $this->sorties_no_sortie;
    }

    public function setSortiesNoSortie(?Sorties $sorties_no_sortie): self
    {
        $this->sorties_no_sortie = $sorties_no_sortie;

        return $this;
    }

    public function getParticipantsNoParticipant(): ?Participants
    {
        return $this->participants_no_participant;
    }

    public function setParticipantsNoParticipant(?Participants $participants_no_participant): self
    {
        $this->participants_no_participant = $participants_no_participant;

        return $this;
    }
}
