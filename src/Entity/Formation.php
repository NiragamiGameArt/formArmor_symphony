<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormationRepository::class)
 */
class Formation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
	
	/**
	* @ORM\OneToMany(targetEntity="App\Entity\Plan_formation",
	mappedBy="formation")
	*/
	private $plans; // Ici plans prend un « s », car une formation a plusieurs plans !
	
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $niveau;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type_form;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $diplomante;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\Column(type="float")
     */
    private $coutrevient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }
    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }
    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getTypeForm(): ?string
    {
        return $this->type_form;
    }
    public function setTypeForm(string $type_form): self
    {
        $this->type_form = $type_form;

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

    public function getDiplomante(): ?bool
    {
        return $this->diplomante;
    }
    public function setDiplomante(bool $diplomante): self
    {
        $this->diplomante = $diplomante;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }
    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getCoutrevient(): ?float
    {
        return $this->coutrevient;
    }
    public function setCoutrevient(float $coutrevient): self
    {
        $this->coutrevient = $coutrevient;

        return $this;
    }
	
		/**
     *
     *
     * @return string
     */
    public function affichage()
    {
        return ($this->libelle . "-" . $this->niveau);
    }
	
	/**
     * Constructor
     */
    public function __construct()
    {
        // on a un attribut qui doit contenir un ArrayCollection, on doit l'initialiser dans le constructeur
		$this->plans = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add plan
     *
     * @param \App\Entity\Plan_formation $plan
     *
     * @return Formation
     */
    public function addPlan(\App\Entity\Plan_formation $plan)
    {
        $this->plans[] = $plan;
		$plans->setFormation($this);
        return $this;
    }
    /**
     * Remove plan
     *
     * @param \App\Entity\Plan_formation $plan
     */
    public function removePlan(\App\Entity\Plan_formation $plan)
    {
        $this->plans->removeElement($plan);
    }
    /**
     * Get plans
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlans()
    {
        return $this->plans;
    }
}
