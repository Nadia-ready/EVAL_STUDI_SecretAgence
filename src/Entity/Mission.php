<?php

namespace App\Entity;

use App\Repository\MissionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=MissionRepository::class)
 */
class Mission
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message="Attention, le titre doit être rempli!")
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message="Attention, la description doit être remplie!")
     * @Assert\Length(
     *     min=10,
     *     max=255,
     *     minMessage= "Merci de remplir plus de 10 caractères.",
     *     maxMessage ="Merci de ne pas remplir plus de 255 caractères."
     * )
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message="Attention, le nm de code doit être rempli!")
     * @Assert\Length(
     *     min=3,
     *     max=20,
     *     minMessage= "Merci de remplir plus de 3 caractères.",
     *     maxMessage ="Merci de ne pas remplir plus de 20 caractères."
     * )
     */
    private $nom_code;

    /**
     * @ORM\Column(type="date")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="date")
     */
    private $date_fin;


    /**
     * @ORM\ManyToOne(targetEntity=Agent::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agent;

    /**
     * @ORM\ManyToOne(targetEntity=Specialite::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specialite;

    /**
     * @ORM\ManyToOne(targetEntity=Statut::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity=TypesMission::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typesMission;

    /**
     * @ORM\ManyToOne(targetEntity=Planque::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $planque;

    /**
     * @ORM\ManyToOne(targetEntity=Contact::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contact;

    /**
     * @ORM\ManyToOne(targetEntity=Cible::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cible;

    /**
     * @ORM\ManyToOne(targetEntity=Nationalite::class, inversedBy="missions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nationalite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNomCode(): ?string
    {
        return $this->nom_code;
    }

    public function setNomCode(string $nom_code): self
    {
        $this->nom_code = $nom_code;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }


    public function getAgent(): ?Agent
    {
        return $this->agent;
    }

    public function setAgent(?Agent $agent): self
    {
        $this->agent = $agent;

        return $this;
    }

    public function getSpecialite(): ?Specialite
    {
        return $this->specialite;
    }

    public function setSpecialite(?Specialite $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getStatut(): ?Statut
    {
        return $this->statut;
    }

    public function setStatut(?Statut $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getTypesMission(): ?TypesMission
    {
        return $this->typesMission;
    }

    public function setTypesMission(?TypesMission $typesMission): self
    {
        $this->typesMission = $typesMission;

        return $this;
    }

    public function getPlanque(): ?Planque
    {
        return $this->planque;
    }

    public function setPlanque(?Planque $planque): self
    {
        $this->planque = $planque;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getCible(): ?Cible
    {
        return $this->cible;
    }

    public function setCible(?Cible $cible): self
    {
        $this->cible = $cible;

        return $this;
    }

    public function getNationalite(): ?Nationalite
    {
        return $this->nationalite;
    }

    public function setNationalite(?Nationalite $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }
}
