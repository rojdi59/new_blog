<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Table(name="departement", indexes={@ORM\Index(name="departement_region_FK", columns={"code_region"})})
 * @ORM\Entity(repositoryClass="App\Repository\DepartementRepository") 
 */
class Departement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_departement", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDepartement;

    /**
     * @var string
     *
     * @ORM\Column(name="code_departement", type="string", length=3, nullable=false)
     */
    private $codeDepartement;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_departement", type="string", length=100, nullable=false)
     */
    private $nomDepartement;

    /**
     * @var string
     *
     * @ORM\Column(name="slug_departement", type="string", length=100, nullable=false)
     */
    private $slugDepartement;

    /**
     * @var \Region
     *
     * @ORM\ManyToOne(targetEntity="Region")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="code_region", referencedColumnName="id_region")
     * })
     */
    private $codeRegion;

    public function getIdDepartement(): ?int
    {
        return $this->idDepartement;
    }

    public function getCodeDepartement(): ?string
    {
        return $this->codeDepartement;
    }

    public function setCodeDepartement(string $codeDepartement): static
    {
        $this->codeDepartement = $codeDepartement;

        return $this;
    }

    public function getNomDepartement(): ?string
    {
        return $this->nomDepartement;
    }

    public function setNomDepartement(string $nomDepartement): static
    {
        $this->nomDepartement = $nomDepartement;

        return $this;
    }

    public function getSlugDepartement(): ?string
    {
        return $this->slugDepartement;
    }

    public function setSlugDepartement(string $slugDepartement): static
    {
        $this->slugDepartement = $slugDepartement;

        return $this;
    }

    public function getCodeRegion(): ?Region
    {
        return $this->codeRegion;
    }

    public function setCodeRegion(?Region $codeRegion): static
    {
        $this->codeRegion = $codeRegion;

        return $this;
    }


}
