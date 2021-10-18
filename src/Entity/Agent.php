<?php

namespace App\Entity;

use App\Repository\AgentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AgentRepository::class)
 */
class Agent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="integer")
     */
    private $code_identification;

    /**
     * @ORM\ManyToOne(targetEntity=Nationalite::class, inversedBy="agents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nationalite;

    /**
     * @ORM\ManyToOne(targetEntity=Specialite::class, inversedBy="agents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specialité;

    /**
     * @ORM\OneToMany(targetEntity=Mission::class, mappedBy="agent")
     */
    private $missions;

    /**
     * @ORM\ManyToMany(targetEntity=Agent::class, inversedBy="agents")
     */
    private $agent;






    public function __construct()
    {
        $this->nationalite = new ArrayCollection();
        $this->specialite = new ArrayCollection();
        $this->missions = new ArrayCollection();
        $this->agent = new ArrayCollection();

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

    public function getCodeIdentification(): ?int
    {
        return $this->code_identification;
    }

    public function setCodeIdentification(int $code_identification): self
    {
        $this->code_identification = $code_identification;

        return $this;
    }

    /**
     * @return Collection|Nationalite[]
     */
    public function getNationalite(): Collection
    {
        return $this->nationalite;
    }

    public function addNationalite(Nationalite $nationalite): self
    {
        if (!$this->nationalite->contains($nationalite)) {
            $this->nationalite[] = $nationalite;
            $nationalite->setAgent($this);
        }

        return $this;
    }

    public function removeNationalite(Nationalite $nationalite): self
    {
        if ($this->nationalite->removeElement($nationalite)) {
            // set the owning side to null (unless already changed)
            if ($nationalite->getAgent() === $this) {
                $nationalite->setAgent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Specialite[]
     */
    public function getSpecialite(): Collection
    {
        return $this->specialite;
    }

    public function addSpecialite(Specialite $specialite): self
    {
        if (!$this->specialite->contains($specialite)) {
            $this->specialite[] = $specialite;
            $specialite->setAgent($this);
        }

        return $this;
    }

    public function removeSpecialite(Specialite $specialite): self
    {
        if ($this->specialite->removeElement($specialite)) {
            // set the owning side to null (unless already changed)
            if ($specialite->getAgent() === $this) {
                $specialite->setAgent(null);
            }
        }

        return $this;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getSpecialité(): ?Specialite
    {
        return $this->specialité;
    }

    public function setSpecialité(?Specialite $specialité): self
    {
        $this->specialité = $specialité;

        return $this;
    }

    /**
     * @return Collection|Mission[]
     */
    public function getMissions(): Collection
    {
        return $this->missions;
    }

    public function addMission(Mission $mission): self
    {
        if (!$this->missions->contains($mission)) {
            $this->missions[] = $mission;
            $mission->setAgent($this);
        }

        return $this;
    }

    public function removeMission(Mission $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            // set the owning side to null (unless already changed)
            if ($mission->getAgent() === $this) {
                $mission->setAgent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getAgent(): Collection
    {
        return $this->agent;
    }

    public function addAgent(self $agent): self
    {
        if (!$this->agent->contains($agent)) {
            $this->agent[] = $agent;
        }

        return $this;
    }

    public function removeAgent(self $agent): self
    {
        $this->agent->removeElement($agent);

        return $this;
    }


}
