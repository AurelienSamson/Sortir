<?php

namespace App\Entity;

use App\Repository\SortiesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SortiesRepository::class)
 */
class Sorties
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $no_sortie;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nom;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datedebut;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datecloture;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbinscriptionmax;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptioninfos;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $etatsortie;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    private $urlphoto;

    /**
     * @ORM\ManyToOne(targetEntity=Participants::class)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id")
     */
    private $organisateur;

    /**
     * @ORM\ManyToOne(targetEntity=Lieux::class)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="no_lieu")
     */
    private $lieux_no_lieu;

    /**
     * @ORM\ManyToOne(targetEntity=Etats::class)
     * @ORM\JoinColumn(nullable=false, referencedColumnName="no_etat")
     */
    private $etats_no_etat;

    public function getNoSortie(): ?int
    {
        return $this->no_sortie;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(\DateTimeInterface $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDatecloture(): ?\DateTimeInterface
    {
        return $this->datecloture;
    }

    public function setDatecloture(\DateTimeInterface $datecloture): self
    {
        $this->datecloture = $datecloture;

        return $this;
    }

    public function getNbinscriptionmax(): ?int
    {
        return $this->nbinscriptionmax;
    }

    public function setNbinscriptionmax(int $nbinscriptionmax): self
    {
        $this->nbinscriptionmax = $nbinscriptionmax;

        return $this;
    }

    public function getDescriptioninfos(): ?string
    {
        return $this->descriptioninfos;
    }

    public function setDescriptioninfos(?string $descriptioninfos): self
    {
        $this->descriptioninfos = $descriptioninfos;

        return $this;
    }

    public function getEtatsortie(): ?int
    {
        return $this->etatsortie;
    }

    public function setEtatsortie(?int $etatsortie): self
    {
        $this->etatsortie = $etatsortie;

        return $this;
    }

    public function getUrlphoto(): ?string
    {
        return $this->urlphoto;
    }

    public function setUrlphoto(?string $urlphoto): self
    {
        $this->urlphoto = $urlphoto;

        return $this;
    }

    public function getOrganisateur(): ?int
    {
        return $this->organisateur;
    }

    public function setOrganisateur(int $organisateur): self
    {
        $this->organisateur = $organisateur;

        return $this;
    }

    public function getLieuxNoLieu(): ?Lieux
    {
        return $this->lieux_no_lieu;
    }

    public function setLieuxNoLieu(?Lieux $lieux_no_lieu): self
    {
        $this->lieux_no_lieu = $lieux_no_lieu;

        return $this;
    }

    public function getEtatsNoEtat(): ?self
    {
        return $this->etats_no_etat;
    }

    public function setEtatsNoEtat(?self $etats_no_etat): self
    {
        $this->etats_no_etat = $etats_no_etat;

        return $this;
    }
}
