<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
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
    private $nomService;

    /**
     * @ORM\OneToMany(targetEntity=Y::class, mappedBy="employes", orphanRemoval=true)
     */
    private $comporte;

    public function __construct()
    {
        $this->comporte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomService(): ?string
    {
        return $this->nomService;
    }

    public function setNomService(string $nomService): self
    {
        $this->nomService = $nomService;

        return $this;
    }

    /**
     * @return Collection|Y[]
     */
    public function getComporte(): Collection
    {
        return $this->comporte;
    }

    public function addComporte(Y $comporte): self
    {
        if (!$this->comporte->contains($comporte)) {
            $this->comporte[] = $comporte;
            $comporte->setEmployes($this);
        }

        return $this;
    }

    public function removeComporte(Y $comporte): self
    {
        if ($this->comporte->removeElement($comporte)) {
            // set the owning side to null (unless already changed)
            if ($comporte->getEmployes() === $this) {
                $comporte->setEmployes(null);
            }
        }

        return $this;
    }
}
