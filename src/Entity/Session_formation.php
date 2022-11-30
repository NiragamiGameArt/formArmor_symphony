<?php
namespace App\Entity;

use App\Repository\Session_formationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=Session_formationRepository::class)
 */
class Session_formation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

	/**
	 * @ORM\ManyToOne (targetEntity="App\Entity\Formation")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $formation;
	
    /**
     * @ORM\Column(type="smallint")
     */
    private $nbPlaces;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nbInscrits;

    /**
     * @ORM\Column(type="boolean")
     */
    private $close;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getNbPlaces(): ?int
    {
        return $this->nbPlaces;
    }

    public function setNbPlaces(int $nbPlaces): self
    {
        $this->nbPlaces = $nbPlaces;

        return $this;
    }

    public function getNbInscrits(): ?int
    {
        return $this->nbInscrits;
    }

    public function setNbInscrits(int $nbInscrits): self
    {
        $this->nbInscrits = $nbInscrits;

        return $this;
    }

    public function getClose(): ?bool
    {
        return $this->close;
    }

    public function setClose(bool $close): self
    {
        $this->close = $close;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }
}
