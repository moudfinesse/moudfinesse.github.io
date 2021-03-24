<?php

namespace App\Entity;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use App\Repository\BonCommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BonCommandeRepository::class)
 */
class BonCommande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer",unique=true)
     */
    private $numCommande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fournisseur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $typeDocument;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomClient;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCommande;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\ManyToOne(targetEntity=Y::class, inversedBy="bonscommandes")
     *
     */
    private $validePar;
    
    


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateValidation;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $listeValideurs = [];

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $validBudget;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $validManagement;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $validComptabilite;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumCommande(): ?int
    {
        return $this->numCommande;
    }

    public function setNumCommande(int $numCommande): self
    {
        $this->numCommande = $numCommande;

        return $this;
    }

    public function getFournisseur(): ?string
    {
        return $this->fournisseur;
    }

    public function setFournisseur(string $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getTypeDocument(): ?string
    {
        return $this->typeDocument;
    }

    public function setTypeDocument(?string $typeDocument): self
    {
        $this->typeDocument = $typeDocument;

        return $this;
    }

    public function getNomClient(): ?string
    {
        return $this->nomClient;
    }

    public function setNomClient(string $nomClient): self
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getValidePar(): ?Y
    {
        return $this->validePar;
    }

    public function setValidePar(?Y $validePar): self
    {
        $this->validePar = $validePar;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDateValidation(): ?\DateTimeInterface
    {
        return $this->dateValidation;
    }

    public function setDateValidation(?\DateTimeInterface $dateValidation): self
    {
        $this->dateValidation = $dateValidation;

        return $this;
    }

    public function getListeValideurs(): ?array
    {
        return $this->listeValideurs;
    }

    public function setListeValideurs(?array $listeValideurs): self
    {
        $this->listeValideurs = $listeValideurs;

        return $this;
    }

    public function getValidBudget(): ?bool
    {
        return $this->validBudget;
    }

    public function setValidBudget(?bool $validBudget): self
    {
        $this->validBudget = $validBudget;

        return $this;
    }

    public function getValidManagement(): ?bool
    {
        return $this->validManagement;
    }

    public function setValidManagement(?bool $validManagement): self
    {
        $this->validManagement = $validManagement;

        return $this;
    }

    public function getValidComptabilite(): ?bool
    {
        return $this->validComptabilite;
    }

    public function setValidComptabilite(?bool $validComptabilite): self
    {
        $this->validComptabilite = $validComptabilite;

        return $this;
    }
}
