<?php
namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

	/**
	 * @ORM\ManyToOne (targetEntity="App\Entity\Statut")
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $statut;
	
    /**
     * @ORM\Column(type="string", length=40)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $email;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nbhcpta;

    /**
     * @ORM\Column(type="smallint")
     */
    private $nbhbur;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $tel;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

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

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getNbhcpta(): ?int
    {
        return $this->nbhcpta;
    }

    public function setNbhcpta(int $nbhcpta): self
    {
        $this->nbhcpta = $nbhcpta;

        return $this;
    }

    public function getNbhbur(): ?int
    {
        return $this->nbhbur;
    }

    public function setNbhbur(int $nbhbur): self
    {
        $this->nbhbur = $nbhbur;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

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
}
