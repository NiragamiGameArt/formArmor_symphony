<?php

namespace App\Entity;

use App\Repository\Plan_formationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=Plan_formationRepository::class)
 */
class Plan_formation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
	* @ORM\ManyToOne(targetEntity="App\Entity\Formation")
	* @ORM\JoinColumn(nullable=false)
	*/
	private $formation;
	
	/**
	* @ORM\ManyToOne(targetEntity="App\Entity\Client")
	* @ORM\JoinColumn(nullable=false)
	*/
	private $client;
	
    /**
     * @ORM\Column(type="boolean")
     */
    private $effectue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEffectue(): ?bool
    {
        return $this->effectue;
    }

    public function setEffectue(bool $effectue): self
    {
        $this->effectue = $effectue;

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

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
