<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\ContactRepository;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message="Nom obligatoire")
     * @Assert\Length(
     *     min=3,
     *     max=20,
     *     minMessage="Merci de saisir plus de 3 caractères",
     *     maxMessage="Merci de saisir plus de 20 caractères"
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message="Prénom obligatoire")
     * @Assert\Length(
     *     min=3,
     *     max=20,
     *     minMessage="Merci de saisir plus de 3 caractères",
     *     maxMessage="Merci de saisir plus de 20 caractères"
     * )
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="integer", length=11)
     */
    private $nom_code;

    /**
     * @ORM\ManyToOne(targetEntity=Nationalite::class, inversedBy="contacts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nationalite;

    /**
     * @ORM\ManyToMany(targetEntity=Mission::class)
     * @ORM\JoinTable(name="mission_contact",
     *      joinColumns={@ORM\JoinColumn(name="contact_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="mission_id", referencedColumnName="id")}
     * )
     */
    private $missions;

    public function __construct()
    {
        $this->missions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

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

    public function getNationalite(): ?Nationalite
    {
        return $this->nationalite;
    }

    public function setNationalite(?Nationalite $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getMissions(): Collection
    {
        return $this->missions;
    }

    public function addMission(Mission $mission): self
    {
        if (!$this->missions->contains($mission)) {
            $this->missions->add($mission);
            $mission->addContact($this);
        }

        return $this;
    }

    public function removeMission(Mission $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            $mission->removeContact($this);
        }

        return $this;
    }

    public function setMissions(Collection $missions): self
    {
        $this->missions = $missions;

        return $this;
    }
}