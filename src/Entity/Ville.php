<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville", indexes={@ORM\Index(name="ville_departement_FK", columns={"code_departement"})})
 * @ORM\Entity(repositoryClass="App\Repository\VilleRepository") 
 */
class Ville
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_ville", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVille;

    /**
     * @var string
     *
     * @ORM\Column(name="code_insee", type="string", length=5, nullable=false, options={"fixed"=true})
     */
    private $codeInsee;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=5, nullable=false, options={"fixed"=true})
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_ville", type="string", length=100, nullable=false)
     */
    private $nomVille;

    /**
     * @var string
     *
     * @ORM\Column(name="slug_ville", type="string", length=100, nullable=false)
     */
    private $slugVille;

    /**
     * @var float
     *
     * @ORM\Column(name="lat_ville", type="float", precision=10, scale=0, nullable=false)
     */
    private $latVille;

    /**
     * @var float
     *
     * @ORM\Column(name="long_ville", type="float", precision=10, scale=0, nullable=false)
     */
    private $longVille;

    /**
     * @var \Departement
     *
     * @ORM\ManyToOne(targetEntity="Departement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="code_departement", referencedColumnName="id_departement")
     * })
     */
    private $codeDepartement;

    public function getIdVille(): ?int
    {
        return $this->idVille;
    }

    public function getCodeInsee(): ?string
    {
        return $this->codeInsee;
    }

    public function setCodeInsee(string $codeInsee): static
    {
        $this->codeInsee = $codeInsee;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getNomVille(): ?string
    {
        return $this->nomVille;
    }

    public function setNomVille(string $nomVille): static
    {
        $this->nomVille = $nomVille;

        return $this;
    }

    public function getSlugVille(): ?string
    {
        return $this->slugVille;
    }

    public function setSlugVille(string $slugVille): static
    {
        $this->slugVille = $slugVille;

        return $this;
    }

    public function getLatVille(): ?float
    {
        return $this->latVille;
    }

    public function setLatVille(float $latVille): static
    {
        $this->latVille = $latVille;

        return $this;
    }

    public function getLongVille(): ?float
    {
        return $this->longVille;
    }

    public function setLongVille(float $longVille): static
    {
        $this->longVille = $longVille;

        return $this;
    }

    public function getCodeDepartement(): ?Departement
    {
        return $this->codeDepartement;
    }

    public function setCodeDepartement(?Departement $codeDepartement): static
    {
        $this->codeDepartement = $codeDepartement;

        return $this;
    }


}
