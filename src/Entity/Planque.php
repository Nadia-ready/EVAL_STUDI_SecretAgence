<?php

namespace App\Entity;

use App\Repository\PlanqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PlanqueRepository::class)
 */
class Planque
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotNull(message="Code obligatoire")
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\ManyToOne(targetEntity=TypePlanque::class, inversedBy="planques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Nationalite::class, inversedBy="planques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nationalite;

    /**
     * @ORM\ManyToMany(targetEntity=Mission::class, mappedBy="planque")
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

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getType(): TypePlanque
    {
        return $this->type;
    }

    public function setType(?TypePlanque $type): self
    {
        $this->type = $type;

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
            $mission->addPlanque($this);
        }

        return $this;
    }

    public function removeMission(Mission $mission): self
    {
        if ($this->missions->removeElement($mission)) {
            $mission->removePlanque($this);
        }

        return $this;
    }

    public function setMissions(Collection $missions): self
    {
        $this->missions = $missions;

        return $this;
    }
}
